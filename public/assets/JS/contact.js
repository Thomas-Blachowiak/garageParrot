document.getElementById("contact-link").addEventListener("click", function(event) {
    event.preventDefault(); // Pour empêcher le comportement par défaut du lien

    // Récupérer les informations de l'annonce à partir des attributs data
    var name = this.dataset.name;
    var price = this.dataset.price;
    var year = this.dataset.year;
    var kilometer = this.dataset.kilometer;

    // Pré-remplir le champ de texte du formulaire avec les informations de l'annonce
    var contentField = document.getElementById("content");
    contentField.value = "Je suis intéressé par l'annonce de la voiture " + name +
                        ". Le prix demandé est de " + price +
                        "€. Année : " + year +
                        ". Kilométrage : " + kilometer + "km.";
});