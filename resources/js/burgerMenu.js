const burger_menu = document.querySelector('.j-burger');
const overlay = document.querySelector('.j-overlay');
burger_menu.addEventListener('click', (e) => {
    overlay.classList.toggle("show-overlay")
});

overlay.addEventListener('click', () => {
    overlay.classList.toggle("show-overlay");
})