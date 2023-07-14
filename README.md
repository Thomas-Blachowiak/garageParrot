# Projet Garage V. PARROT 

Il s'agit d'un projet pour un garage fictif proposant des services automobiles ainsi que la vente de véhicules d'occasion. L'administrateur (gérant) dispose d'une interface back-end lui permettant de gérer l'ensemble du site (création d'utilisateurs/employés, publication d'annonces pour les véhicules d'occasion, gestion des demandes clients, gestion des témoignages clients, etc.). Les employés ont également accès au back-end, mais avec des autorisations restreintes. 

## Accéder au site en ligne:

**http://vast-reef-81204-cc696d8e68f9.herokuapp.com**


## Cloner le projet :

Pour cloner le projet, exécutez la commande suivante :

```bash
git clone https://github.com/Thomas-Blachowiak/garageParrot.git
```
## Prérequis:

* PHP 8 ou version supérieur,

* Composer (gestionnaire de dépendances PHP),

## Etapes :


* Accédez au répertoire du projet :

        ~ cd garageParrot

* Installez les dépendances requises en utilisant Composer  :

        ~ composer install

* Modifier le fichier .env à la racine du projet:

Ouvrir le fichier '.env' et ajoutez les valeurs des variables d'environnement suivant votre configuration locale :

        DATABASE_URL="mysql://nom_utilisateur:mot_de_passe@127.0.0.1:port/nom_du_projet?serverVersion=8&charset=utf8mb4"

***Pour vous connecter en tant qu'admin sur le site, il vous faudra créer un utilisateur avec un 'ROLE_ADMIN' qui pourra gérer les actions.***

