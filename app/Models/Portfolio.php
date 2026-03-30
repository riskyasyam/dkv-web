<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        "title",
        "category",
        "description",
        "image",
        "pdf",
        "youtube_url",
        "order",
        "is_published"
    ];

    protected $casts = [
        "is_published" => "boolean",
    ];
}
