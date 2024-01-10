import './bootstrap';

import 'flowbite';

import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()

document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.getElementById('navbar');
    let lastScrollTop = 0;

    window.addEventListener('scroll', function () {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            // Scrolling down
            navbar.classList.add('-translate-y-full');
        } else {
            // Scrolling up
            navbar.classList.remove('-translate-y-full');
        }

        lastScrollTop = scrollTop;
    });
});
