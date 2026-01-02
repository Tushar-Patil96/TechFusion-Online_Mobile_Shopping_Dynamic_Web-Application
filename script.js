
//slider related code for Third Portion

const slider = document.querySelector('.slider .items');
const items = document.querySelectorAll('.slider .item');
const prevButton = document.getElementById('prev');
const nextButton = document.getElementById('next');
let currentIndex = 0;
const slideDuration = 3000;

function showSlide(index) {
    if (index >= items.length) {
        currentIndex = 0;
    } else if (index < 0) {
        currentIndex = items.length - 1;
    } else {
        currentIndex = index;
    }
    slider.style.transform = `translateX(-${currentIndex * 100}%)`;
}

function nextSlide() {
    showSlide(currentIndex + 1);
}

function prevSlide() {
    showSlide(currentIndex - 1);
}

nextButton.addEventListener('click', nextSlide);
prevButton.addEventListener('click', prevSlide);

setInterval(nextSlide, slideDuration);






//second slider code for Fourth Portion



const slider1 = document.querySelector('.slider1');
const cards = document.querySelectorAll('.card');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
const visibleCards = 3.5;
const totalCards = cards.length;

function updateButtons() {
    prevBtn.disabled = currentIndex ===0;
    nextBtn.disabled = currentIndex >= totalCards - visibleCards;
}

function updateSlider() {
    slider1.style.transform = `translateX(-${currentIndex * (100 / visibleCards)}%)`;
    updateButtons();
}

prevBtn.addEventListener('click', () => {
    if (currentIndex > 0) {
        currentIndex--;
        updateSlider();
    }
});

nextBtn.addEventListener('click', () => {
    if (currentIndex < totalCards - visibleCards) {
        currentIndex++;
        updateSlider();
    }
});

updateSlider();






//  Third multiple brand cards code for Fifth Portion


const filter = document.getElementById('brand-filter');
const card1 = document.querySelectorAll('.card1');

function showDefaultCards() {
    const brandsShown = new Set();
    card1.forEach(card1 => {
        const brand = card1.dataset.brand;
        if (!brandsShown.has(brand)) {
            card1.style.display = 'block';
            brandsShown.add(brand);
        } else {
            card1.style.display = 'none';
        }
    });
}

filter.addEventListener('change', () => {
    const selectedBrand = filter.value;

    if (selectedBrand === 'all') {
      showDefaultCards();
    } else {
        card1.forEach(card1 => {
            if (card1.dataset.brand === selectedBrand) {
               card1.style.display = 'block';
           } else {
               card1.style.display = 'none';
           }
       });
    }
});

showDefaultCards();










// Offer Portion code

const sliderTrack = document.getElementById("slider_track");
const sliderWrapper = document.getElementById("slider_wrapper");
const navRadios = document.querySelectorAll('.slider-navigation input[type="radio"]');
const totalSlides = 2; // Adjust based on the number of slides and visible cards
const slideWidth = sliderWrapper.offsetWidth;

let currentSlide = 0;

function updateSliderPosition() {
    sliderTrack.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
}

navRadios.forEach((radio, index) => {
    radio.addEventListener('change', () => {
        currentSlide = index;
        updateSliderPosition();
    });
});

// Adjust for window resizing
window.addEventListener("resize", () => {
    updateSliderPosition();
});

updateSliderPosition();





// hot deals Portion code 

const carouselWrapper = document.querySelector('.carousel-wrapper');
const carouselItems = document.querySelectorAll('.carousel-item');
const prevButtons = document.getElementById('previous');
const nextButtons = document.getElementById('nexxt');

let currentIndexs = 0;
const itemsPerSlide = 3;
const totalSlidess =9;

function updateCarouselPosition() {
    const offset = -currentIndexs * 100 / itemsPerSlide;
    carouselWrapper.style.transform = `translateX(${offset}%)`;
}

nextButtons.addEventListener('click', () => {
    if (currentIndexs < totalSlidess - 1) {
        currentIndexs++;
        updateCarouselPosition();
    }
});

prevButtons.addEventListener('click', () => {
    if (currentIndexs > 0) {
        currentIndexs--;
        updateCarouselPosition();
    }
});