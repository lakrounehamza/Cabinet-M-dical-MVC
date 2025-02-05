# Cabinet-M-dical-MVC
/projet-mvc-php

│── public/ # Dossier public (accessible via le navigateur)

│ ├── index.php # Point d'entrée de l'application

│ ├── .htaccess # Réécriture d'URL et sécurité

│ ├── assets/ # Fichiers CSS, JS, images

│

│── app/ # Code de l'application

│ ├── controllers/ # Contrôleurs (Logique métier)

│ │ ├── front/ # Contrôleurs du Front Office

│ │ │ ├── HomeController.php

│ │ │ ├── ArticleController.php

│ │ ├── back/ # Contrôleurs du Back Office (Admin)

│ │ │ ├── DashboardController.php

│ │ │ ├── UserController.php

│ ├── models/ # Modèles (Gestion de la base de données)

│ │ ├── User.php

│ │ ├── Article.php

│ ├── views/ # Fichiers templates pour les vues

│ │ ├── front/ # Vues pour le Front Office

│ │ │ ├── home.twig

│ │ │ ├── article.twig

│ │ ├── back/ # Vues pour le Back Office (Admin)

│ │ │ ├── dashboard.twig

│ │ │ ├── users.twig

│ ├── core/ # Classes principales de l'application

│ │ ├── Router.php # Gestion des routes

│ │ ├── Controller.php # Classe parent pour les contrôleurs

│ │ ├── Model.php # Classe parent pour les modèles

│ │ ├── View.php # Gestion des templates Twig

│ │ ├── Database.php # Connexion PostgreSQL via PDO

│ │ ├── Auth.php # Gestion des sessions et authentification

│ │ ├── Validator.php # Validation des données

│ │ ├── Security.php # Sécurisation contre XSS, CSRF, SQL Injection

│ │ ├── Session.php # Gestion avancée des sessions

│ ├── config/ # Configuration de l'application

│ │ ├── config.php # Configuration de la base de données

│ │ ├── routes.php # Définition des routes

│── logs/ # Logs d'erreurs et d’accès

│── vendor/ # Dépendances (si usage de Composer)

│── .env # Variables d’environnement

│── composer.json # Gestionnaire de dépendances PHP

│── .gitignore # Fichiers à ignorer par Git