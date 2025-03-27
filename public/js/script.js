function contactSoumis(){
    console.log("Nous vous recontacterons très bientôt");
}

// Carousel Produits

const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');
const cardList = document.querySelector('.card-list');

let currentIndex = 0;

const updateCarousel = () => {
    const cardWidth = document.querySelector('.card-item').offsetWidth;
    cardList.style.transform = `translateX(-${currentIndex * cardWidth + currentIndex * 30}px)`;
};

nextBtn.addEventListener('click', () => {
    const totalItems = document.querySelectorAll('.card-item').length;
    if (currentIndex < totalItems - 1) {
        currentIndex++;
    }
    updateCarousel();
});

prevBtn.addEventListener('click', () => {
    if (currentIndex > 0) {
        currentIndex--;
    }
    updateCarousel();
});