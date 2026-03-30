<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $query = Portfolio::orderBy("order")->orderBy("created_at", "desc");
        
        if ($request->has("category") && $request->category) {
            $query->where("category", $request->category);
        }
        
        $portfolios = $query->paginate(12);
        return view("admin.portfolio.index", compact("portfolios"));
    }

    public function create()
    {
        $categories = ["Graphic Design", "Video", "Photography", "Merchandise"];
        return view("admin.portfolio.create", compact("categories"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|string|max:255",
            "category" => "required|in:Graphic Design,Video,Photography,Merchandise",
            "description" => "nullable|string",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
            "pdf" => "nullable|mimes:pdf|max:5120",
            "youtube_url" => ["nullable", "url", "regex:/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+/i"],
            "order" => "nullable|integer",
            "is_published" => "boolean"
        ]);

        if ($validated["category"] !== "Video") {
            $validated["youtube_url"] = null;
        }

        if ($request->hasFile("image")) {
            $validated["image"] = $request->file("image")->store("portfolios/images", "public");
        }

        if ($request->hasFile("pdf")) {
            $validated["pdf"] = $request->file("pdf")->store("portfolios/pdfs", "public");
        }

        Portfolio::create($validated);
        return redirect()->route("admin.portfolio.index")->with("success", "Portfolio berhasil ditambahkan");
    }

    public function edit(Portfolio $portfolio)
    {
        $categories = ["Graphic Design", "Video", "Photography", "Merchandise"];
        return view("admin.portfolio.edit", compact("portfolio", "categories"));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            "title" => "required|string|max:255",
            "category" => "required|in:Graphic Design,Video,Photography,Merchandise",
            "description" => "nullable|string",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
            "pdf" => "nullable|mimes:pdf|max:5120",
            "youtube_url" => ["nullable", "url", "regex:/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+/i"],
            "order" => "nullable|integer",
            "is_published" => "boolean"
        ]);

        if ($validated["category"] !== "Video") {
            $validated["youtube_url"] = null;
        }

        if ($request->hasFile("image")) {
            if ($portfolio->image) {
                \Storage::disk("public")->delete($portfolio->image);
            }
            $validated["image"] = $request->file("image")->store("portfolios/images", "public");
        }

        if ($request->hasFile("pdf")) {
            if ($portfolio->pdf) {
                \Storage::disk("public")->delete($portfolio->pdf);
            }
            $validated["pdf"] = $request->file("pdf")->store("portfolios/pdfs", "public");
        }

        $portfolio->update($validated);
        return redirect()->route("admin.portfolio.index")->with("success", "Portfolio berhasil diperbarui");
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image) {
            \Storage::disk("public")->delete($portfolio->image);
        }
        if ($portfolio->pdf) {
            \Storage::disk("public")->delete($portfolio->pdf);
        }
        $portfolio->delete();
        return redirect()->route("admin.portfolio.index")->with("success", "Portfolio berhasil dihapus");
    }
}
