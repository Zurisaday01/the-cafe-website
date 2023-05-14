const nav = document.getElementById('navbar');
const section = document.querySelector('#about');
const btnClose = document.querySelector('#close-btn');
const btnOpen = document.querySelector('#open-btn');
const navMobile = document.querySelector('.nav-mobile');
const navLinks = document.querySelectorAll('.nav-mobile__link');

const stickynavbar = () => {
	if (window.scrollY >= section.getBoundingClientRect().top + 400) {
		navbar.classList.add('sticky');
	} else {
		navbar.classList.remove('sticky');
	}
};
window.addEventListener('scroll', stickynavbar);

btnClose.addEventListener('click', () => {
	navMobile.classList.remove('show');
});

btnOpen.addEventListener('click', () => {
	navMobile.classList.add('show');
});

navLinks.forEach(link => {
	link.addEventListener('click', () => {
		navMobile.classList.remove('show');
	});
});
