// FUNZIONE PER LO SNAPSCROLL DEL FOOTER
const scrollContainer = document.getElementById('scroll-container');
const prevButton = document.getElementById('prev');
const nextButton = document.getElementById('next');

prevButton.addEventListener('click', function () {
    scrollContainer.scrollLeft -= 200; // Imposta la quantità di spostamento
});

nextButton.addEventListener('click', function () {
    scrollContainer.scrollLeft += 200; // Imposta la quantità di spostamento
});


