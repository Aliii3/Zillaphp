(function () {
	function applyBackdrop() {
		var selectors = [
			'.section_subtitle',
			'.hero-with-text-left-image-right .title',
			'.content_with_image .section_title',
			'.internal_page_header h2'
		];

		selectors.forEach(function (selector) {
			document.querySelectorAll(selector).forEach(function (el) {
				if (!el.dataset.backdrop) {
					var text = el.textContent.trim().replace(/\s+/g, ' ');
					if (text) {
						el.setAttribute('data-backdrop', text);
					}
				}
			});
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', applyBackdrop);
	} else {
		applyBackdrop();
	}
})();
