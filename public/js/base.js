const images = ["img/photoSalon.jpg","img/photoSalon2.jpg"];
const divChange = document.querySelector(".firstPart");


let i = 0;
function changeBackgroundImage() {
    i++;
    if (i > images.length - 1) i = 0;
    divChange.style.backgroundImage = `url("${images[i]}")`;
}

window.setInterval(changeBackgroundImage, 5000);


    window.scrollTo({
        behavior: 'smooth',
        top:
            document.querySelector(".scroll").getBoundingClientRect().top -
            document.body.getBoundingClientRect().top -
            600,
    })