// Récupérer tous les éléments contenant les notes
let noteElements = document.querySelectorAll('[class^="note-"]');

// Parcourir chaque élément de note
noteElements.forEach(function (noteElement) {
    // Récupérer l'ID du témoignage à partir de la classe
    let testimonialId = noteElement.classList[0].split('-')[1];

    // Récupérer la valeur de la note en utilisant le contenu de la balise Twig
    let note = parseFloat(noteElement.innerText.split(':')[1].trim());

    // Vérifier si la note est valide (entre 1 et 5)
    if (!isNaN(note) && note >= 1 && note <= 5) {
        // Créer une chaîne de caractères contenant les étoiles
        let stars = ' ';
        for (let i = 0; i < note; i++) {
            stars += '★';
        }

        // Créer un nouvel élément span avec la classe "stars" pour afficher les étoiles
        var starsElement = document.createElement('span');
        starsElement.className = 'stars';
        starsElement.textContent = stars;

        // Ajouter l'élément des étoiles à l'endroit souhaité dans votre page
        noteElement.appendChild(starsElement);
    }
});