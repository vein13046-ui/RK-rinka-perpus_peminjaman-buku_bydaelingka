import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Animation on page load
document.addEventListener('DOMContentLoaded', function() {
    // Add fade-in animation to main content with scale effect
    const mainContent = document.querySelector('main') || document.querySelector('.content') || document.body;
    if (mainContent) {
        mainContent.classList.add('animate-fade-in');
    }

    // Add slide-in animations to cards or sections with more dramatic effect
    const cards = document.querySelectorAll('.card, .bg-white, .bg-slate-50, [class*="bg-"]');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(60px) scale(0.8)';
        setTimeout(() => {
            card.classList.add('animate-fade-in-up');
            card.style.opacity = '1';
            card.style.transform = '';
        }, index * 200); // Increased delay for more dramatic effect
    });

    // Add bounce-in for buttons with rotation
    const buttons = document.querySelectorAll('button, .btn, [role="button"]');
    buttons.forEach((btn, index) => {
        btn.style.opacity = '0';
        btn.style.transform = 'scale(0.5) rotate(-10deg)';
        setTimeout(() => {
            btn.classList.add('animate-bounce-in');
            btn.style.opacity = '1';
            btn.style.transform = '';
        }, 800 + index * 150); // Longer delay
    });

    // Add pulse animation to icons or highlights with scale
    const icons = document.querySelectorAll('svg, .icon, i');
    icons.forEach((icon, index) => {
        icon.style.opacity = '0';
        icon.style.transform = 'scale(0.5)';
        setTimeout(() => {
            icon.classList.add('animate-pulse-custom');
            icon.style.opacity = '1';
            icon.style.transform = '';
        }, 1200 + index * 200); // Even longer delay
    });

    // Add slide-in-up for special sections
    const specialSections = document.querySelectorAll('.bg-gradient-to-br');
    specialSections.forEach((section, index) => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(100px) scale(0.9)';
        setTimeout(() => {
            section.classList.add('animate-slide-in-up');
            section.style.opacity = '1';
            section.style.transform = '';
        }, 1500 + index * 300);
    });
});
