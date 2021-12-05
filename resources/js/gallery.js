
const stage = document.querySelector('.j-stage img');
const images = document.querySelectorAll('.j-images');
for (const image of images) {
    image.addEventListener('click', (e) => {
        const target = e.target;
        const src = target.src;
        stage.setAttribute('src', src);
    })
}