let slideIndex = 0; //sets of indexes = set of shown slides
const slides = document.querySelectorAll('.slide');
const slidesToShow = 3; //number of slides to display from the first time
const totalSlides = slides.length; //all coutns of sliders

function showSlide(index) {
    const offset = 100 / slidesToShow; //if 4 sliders then 25% spaces
    slides.forEach((slide, i) => { //iteration
        slide.style.transform = `translateX(${offset * (i - index)}%)`; //moving around x axis

    });
}
function changeSlide(n) {
    const maxIndex = Math.ceil(totalSlides / slidesToShow) - 1; //slider function working
    slideIndex = (slideIndex + n + maxIndex + 1) % (maxIndex + 1); //going to the swap 
    showSlide(slideIndex * slidesToShow); //full slider functionality
}




