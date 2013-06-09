## Exemple Français pour Laravel 4

### Informations en Français sur le framework

[Documentation en français](http://laravel.fr) 

### Statut de cet exemple

**En cours de développement**

Aucun package n'a été utilisé pour montrer les possiblités intrinsèques du framework.

##Inclus

* Twitter Bootstrap pour la mise en forme des pages (design responsive)
* JQuery pour le bon fonctionnement de Bootstrap
* cKEditor pour l'édition des articles
* FileManager pour la gestion des médias
* Fichiers de traduction laravel (https://github.com/laravel-france/laravel-lang-fr)
* Pages d'erreur : 403, 404, 500 et 503
* Back-end : Gestion des utilisateurs, des sections, des catégories et des articles
* 3 rôles : administrateur, rédacteur (ne peut que rédiger des articles et modifier ses articles), utilisateur de base
* Front-end : Navigation dans les sections, catégories et articles, connexion , inscription, renouvellement du mot de passe de l'utilisateur
* Pages du site : accueil, à propos et contactez-nous

##Installation

* Installation classique de Laravel 4
* Créer une base de données et renseigner le fichier app/config/database.php
* "php artisan migrate" pour créer les tables
* "php artisan db:seed" pour ajouter des enregistrements
* Renseigner le fichier app/config/mail.php pour l'envoi des E-mails

## License

[MIT license](http://opensource.org/licenses/MIT)
