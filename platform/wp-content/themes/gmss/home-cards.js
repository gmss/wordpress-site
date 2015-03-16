document.addEventListener('DOMContentLoaded', function() {
	for (var i = 0, els = document.querySelectorAll('.two-columns>.column>article,.listing-item'), el; el = els[i]; ++i) (function(el) {
		el.addEventListener('click', function(e) {
			for (var target = e.target; target && target != el; target = target.parentElement)
				if (target.tagName == 'A')
					return;
			var h = find(el, function(el) {
					return el.tagName == 'H1';
				});
			document.location.href = (h
				? find(h, function(el) {
					return el.tagName == 'A';
				})
				: find(el, function(el) {
					return el.tagName == 'A' && el.classList.contains('title');
				})).href;
		});
	})(el);
	function find(el, matcher) {
		if (el) for (var i = 0, child; child = el.childNodes[i]; ++i)
			if (matcher(child))
				return (child);
			else {
				var deeper = find(child, matcher);
				if (deeper)
					return deeper;
			}
	}
});