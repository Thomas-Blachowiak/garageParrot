// Evénement qui rajoute une ombre supplémentaire au passage de la souris
var testimonialCards = document.getElementsByClassName('event-card');

for (var i = 0; i < testimonialCards.length; i++) {
    var card = testimonialCards[i];

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
var paragraphs = document.getElementsByClassName('text-hover');

for (var i = 0; i < paragraphs.length; i++) {
    var paragraph = paragraphs[i];

    paragraph.addEventListener('mouseenter', function() {
        this.classList.add('text-bigger');
    });

    paragraph.addEventListener('mouseleave', function() {
        this.classList.remove('text-bigger');
    });
}

// Agrandi le logo du nav-bar
document.addEventListener('DOMContentLoaded', function() {
    var image = document.querySelector('.navbar-brand img');
    image.addEventListener('mouseover', function() {
        this.style.transform = 'scale(1.1)';
    });
    image.addEventListener('mouseout', function() {
        this.style.transform = 'scale(1)';
    });
});