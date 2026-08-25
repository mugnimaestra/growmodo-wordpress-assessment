(() => {
	'use strict';

	const announcement = document.querySelector('.announcement');
	const announcementClose = document.querySelector('.announcement-close');
	const toggle = document.querySelector('.menu-toggle');
	const navigation = document.querySelector('.primary-navigation');

	const updateMenuTop = () => {
		const header = document.querySelector('.site-header');
		if (header) document.documentElement.style.setProperty('--menu-top', `${header.offsetHeight}px`);
	};

	if (announcement && announcementClose) {
		announcementClose.addEventListener('click', () => {
			announcement.hidden = true;
			updateMenuTop();
		});
	}

	updateMenuTop();
	if (!toggle || !navigation) return;

	const setOpen = (open) => {
		toggle.setAttribute('aria-expanded', String(open));
		navigation.classList.toggle('is-open', open);
		document.body.classList.toggle('menu-open', open);
	};

	toggle.addEventListener('click', () => {
		setOpen(toggle.getAttribute('aria-expanded') !== 'true');
	});

	navigation.addEventListener('click', (event) => {
		if (event.target.closest('a')) setOpen(false);
	});

	document.addEventListener('keydown', (event) => {
		if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
			setOpen(false);
			toggle.focus();
		}
	});

	window.addEventListener('resize', () => {
		updateMenuTop();
		if (window.matchMedia('(min-width: 981px)').matches) setOpen(false);
	});
})();
