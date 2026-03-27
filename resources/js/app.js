import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
	const revealElements = document.querySelectorAll('.reveal');

	if (! revealElements.length) {
		return;
	}

	const revealObserver = new IntersectionObserver(
		(entries, observer) => {
			entries.forEach((entry) => {
				if (! entry.isIntersecting) {
					return;
				}

				entry.target.classList.add('reveal-visible');
				observer.unobserve(entry.target);
			});
		},
		{
			threshold: 0.15,
			rootMargin: '0px 0px -40px 0px',
		}
	);

	revealElements.forEach((element) => revealObserver.observe(element));
});
