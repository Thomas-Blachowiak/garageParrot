// Evénement qui rajoute une ombre supplémentaire au passage de la souris
let testimonialCards = document.getElementsByClassName('event-card');

for (let i = 0; i < testimonialCards.length; i++) {
    let card = testimonialCards[i];

    card.addEventListener('mouseenter', function() {
        this.style.boxShadow = '0 0 15px rgba(0, 0, 0, 1)';
    });

    card.addEventListener('mouseleave', function() {
        this.style.boxShadow = '';
    });
}


// Evénement qui met en gras les titres sélectionné
let inputTitles = document.getElementsByClassName('bold-title');

for (let i = 0; i < inputTitles.length; i++) {
    let title = inputTitles[i];

    title.addEventListener('mouseover', function() {
        this.style.fontWeight = 'bold';
    });

    title.addEventListener('mouseout', function() {
        this.style.fontWeight = '';
    });
}


// Evénement qui aggrandi le texte qui est pointé par la souris
let paragraphs = document.getElementsByClassName('text-hover');

for (let i = 0; i < paragraphs.length; i++) {
    let paragraph = paragraphs[i];

    paragraph.addEventListener('mouseenter', function() {
        this.classList.add('text-bigger');
    });

    paragraph.addEventListener('mouseleave', function() {
        this.classList.remove('text-bigger');
    });
}

// Agrandi le logo du nav-bar
document.addEventListener('DOMContentLoaded', function() {
    let image = document.querySelector('.navbar-brand img');
    image.addEventListener('mouseover', function() {
        this.style.transform = 'scale(1.1)';
    });
    image.addEventListener('mouseout', function() {
        this.style.transform = 'scale(1)';
    });
});