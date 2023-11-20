# Projet Garage V. PARROT 

Il s'agit d'un projet pour un garage fictif proposant des services automobiles ainsi que la vente de véhicules d'occasion. L'administrateur (gérant) dispose d'une interface back-end lui permettant de gérer l'ensemble du site (création d'utilisateurs/employés, publication d'annonces pour les véhicules d'occasion, gestion des demandes clients, gestion des témoignages clients, etc.). Les employés ont également accès au back-end, mais avec des autorisations restreintes. 

## Accéder au site en ligne:

**https://garage.thomasblachowiak.fr**


## Cloner le projet :

Pour cloner le projet, exécutez la commande suivante :

```bash
git clone https://github.com/Thomas-Blachowiak/garageParrot.git
```
## Prérequis:

* PHP 8 ou version supérieure


* MySQL ou un autre serveur de base de données compatible avec Symfony, je recommande PhpMyAdmin

* Un serveur Web (par exemple Apache ou Nginx), je recommande Mamp

* Composer (gestionnaire de dépendances PHP)

## Etapes :

* Accédez au répertoire du projet :

        ~ cd garageParrot

* Installez les dépendances requises en utilisant Composer  :

        ~ composer install
        ~ composer require webapp

* Modifier le fichier .env à la racine du projet:

Ouvrez le fichier '.env' et ajoutez les valeurs des variables d'environnement suivant votre configuration locale :

        DATABASE_URL="mysql://nom_utilisateur:mot_de_passe@127.0.0.1:port/nom_du_projet?serverVersion=8&charset=utf8mb4"

* Créez la base de données en exécutant la commande suivante :

        ~ symfony console doctrine:database:create

* Créez les tables en utilisant les entités de votre application, attention vous aurez besoin de MakerBundle de Symfony pour executer ces commandes :

        ~ symfony console make:migration
        ~ symfony console doctrine:migrations:migrate

* Démarrez le serveur Web interne de Symfony en exécutant la commande suivante :

        ~ symfony console serve -d

Votre application Symfony est maintenant déployée et accessible à l'adresse http://127.0.0.1:8000

***Pour vous connecter en tant qu'admin sur le site, il vous faudra créer un utilisateur avec un 'ROLE_ADMIN' qui pourra gérer les fonctionnalités.***

* Rendez-vous en base de donnée via PhpMyAdmin

* Lancez la requête SQL : 

        ~ INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES (NULL, ‘toto@free.fr', '[\"ROLE_ADMIN\"]', 'toto')

Vous voilà prêt à exploiter le back-end du site, n'oubliez pas de hacher le mot de passe pour que celui-ci soit sécurisé.


