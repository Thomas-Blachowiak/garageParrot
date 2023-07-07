let filterForm = document.getElementById('filter-form');

filterForm.addEventListener('submit', function (event) {
    event.preventDefault(); // Empêcher le rechargement de la page par défaut lors de la soumission du formulaire

    let yearMinFilter = parseInt(document.getElementById('year-min-filter').value);
    let yearMaxFilter = parseInt(document.getElementById('year-max-filter').value);
    let kilometerMinFilter = parseInt(document.getElementById('kilometer-min-filter').value);
    let kilometerMaxFilter = parseInt(document.getElementById('kilometer-max-filter').value);
    let priceMinFilter = parseInt(document.getElementById('price-min-filter').value);
    let priceMaxFilter = parseInt(document.getElementById('price-max-filter').value);

    let usedCars = document.getElementsByClassName('col-md-auto');
    for (let i = 0; i < usedCars.length; i++) {
        let usedCar = usedCars[i];
        let year = parseInt(usedCar.getAttribute('data-year'));
        let kilometer = parseInt(usedCar.getAttribute('data-kilometer'));
        let price = parseInt(usedCar.getAttribute('data-price'));

        // Comparez les valeurs avec les critères de filtrage
        if (year < yearMinFilter || year > yearMaxFilter || kilometer < kilometerMinFilter || kilometer > kilometerMaxFilter || price < priceMinFilter || price > priceMaxFilter) {
            usedCar.style.display = 'none'; // Masquez les véhicules qui ne correspondent pas aux critères
        } else {
            usedCar.style.display = 'block'; // Affichez les véhicules qui correspondent aux critères
        }
    }
});
// Sélectionne le bouton de réinitialisation par son ID
let resetButton = document.getElementById('reset-button');

// Ajoute un gestionnaire d'événements pour le clic sur le bouton de réinitialisation
resetButton.addEventListener('click', function () { // Réinitialise les valeurs des éléments de filtre à leur état initial
    document.getElementById('year-min-filter').value = '';
    document.getElementById('year-max-filter').value = '';
    document.getElementById('kilometer-min-filter').value = '';
    document.getElementById('kilometer-max-filter').value = '';
    document.getElementById('price-min-filter').value = '';
    document.getElementById('price-max-filter').value = '';
});
