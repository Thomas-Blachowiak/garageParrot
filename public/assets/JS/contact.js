document.getElementById('sendInfo').addEventListener('click', function(event) {
  event.preventDefault(); // Empêche le comportement par défaut du lien

  // Récupérez les informations du véhicule
  let name = document.getElementById('nameCar').textContent.trim();
  let price = document.getElementById('price').textContent.replace('Prix: ', '').replace('€', '');
  let year = document.getElementById('annee').textContent.replace('Première immatriculation: ', '');
  let kilometer = document.getElementById('km').textContent.replace('Nombre de km: ', '');

  // Construisez le contenu à insérer dans le champ "contentField"
  let content = `Véhicule : ${name}\n\n`;
  content += `Prix : ${price}€\n`;
  content += `Année : ${year}\n`;
  content += `Kilométrage : ${kilometer}km`;

  // Insérez le contenu dans le champ "contentField" du formulaire
  document.getElementById('contentField').value = content;

  // Effectuez d'autres actions, comme soumettre le formulaire si nécessaire
  document.getElementById('filter-form').submit();
});
