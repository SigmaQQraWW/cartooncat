// main.js
document.addEventListener('DOMContentLoaded', function() {
    // Воспроизведение звука при наведении
    var hoverElements = document.querySelectorAll('.nav__link');
    hoverElements.forEach(function(element) {
        element.addEventListener('mouseenter', function() {
            document.getElementById('hover-sound').play();
        });
    });

    // Воспроизведение звука при клике
    var clickElements = document.querySelectorAll('.nav__link');
    clickElements.forEach(function(element) {
        element.addEventListener('click', function() {
            document.getElementById('click-sound').play();
        });
    });

    // Анимация появления элементов
    var animatedElements = document.querySelectorAll('.animated');
    animatedElements.forEach(function(element) {
        element.classList.add('fadeIn');
    });
});
