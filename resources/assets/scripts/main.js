const hamburger = document.querySelector('.hamburger');
const hamburgerNav = document.querySelector('.hamburger-nav');


hamburger.addEventListener('click', () => {
    hamburgerNav.classList.toggle('menu-open');
});