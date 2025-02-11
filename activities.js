document.querySelectorAll('.image-left').forEach((imageContainer) => {
    const images = imageContainer.querySelectorAll('.hover-image');
    images[0].addEventListener('mouseover', () => {
        images[0].style.display = 'none';
        images[1].style.display = 'block';
    });

    images[1].addEventListener('mouseout', () => {
        images[0].style.display = 'block';
        images[1].style.display = 'none';
    });
});
