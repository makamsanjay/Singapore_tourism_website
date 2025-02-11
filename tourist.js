// JavaScript for image hover effect
const hoverImages = document.querySelectorAll('.image-left');

hoverImages.forEach(imageDiv => {
    const images = imageDiv.querySelectorAll('.hover-image');
    
    images[0].addEventListener('mouseenter', () => {
        images[0].style.display = 'none'; // Hide the first image
        images[1].style.display = 'block'; // Show the hover image
    });

    images[1].addEventListener('mouseleave', () => {
        images[0].style.display = 'block'; // Show the first image
        images[1].style.display = 'none'; // Hide the hover image
    });
});

// JavaScript for automatic image carousel in the gallery
const galleryImages = document.querySelectorAll('.carousel img');
let currentIndex = 0;

function showNextImage() {
    galleryImages[currentIndex].style.display = 'none'; // Hide current image
    currentIndex = (currentIndex + 1) % galleryImages.length; // Move to next image
    galleryImages[currentIndex].style.display = 'block'; // Show next image
}

// Initial setup for the gallery
galleryImages.forEach((img, index) => {
    img.style.display = index === 0 ? 'block' : 'none'; // Show only the first image
});

// Change image every 3 seconds
setInterval(showNextImage, 3000);
