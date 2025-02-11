// Image Hover Change
function changeImage(img) {
    img.src = 'singapore_main_hover.jpg';  // Replace this with the hover image
}

function restoreImage(img) {
    img.src = 'singapore_main.jpg';  // Original image
}

// Carousel Functionality
document.addEventListener("DOMContentLoaded", function() {
    const carouselImages = document.querySelectorAll('.carousel-img');
    let currentImageIndex = 0;
    const imageCount = carouselImages.length;

    // Show the first image
    carouselImages[currentImageIndex].classList.add('active');

    // Function to cycle through images
    function changeCarouselImage() {
        carouselImages[currentImageIndex].classList.remove('active');
        currentImageIndex = (currentImageIndex + 1) % imageCount;
        carouselImages[currentImageIndex].classList.add('active');
    }

    // Set interval to change image every 3 seconds
    setInterval(changeCarouselImage, 3000);
});
