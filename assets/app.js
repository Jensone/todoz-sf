import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

// Menu toggle
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menuToggle');
    const menuClose = document.getElementById('menuClose');
    const menuOverlay = document.querySelector('.menu-overlay');
    
    menuToggle.addEventListener('click', function() {
        menuOverlay.classList.remove('hidden');
        document.body.classList.add('menu-open');
    });

    menuClose.addEventListener('click', function() {
        menuOverlay.classList.add('hidden');
        document.body.classList.remove('menu-open');
    });
});


