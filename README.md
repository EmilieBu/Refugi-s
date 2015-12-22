# TropiCamps

Powered with :D by Tropicano

### Installation
- Installer Symfony dans un dossier "symfony"
- Cloner ce même dépôt à la même racine
- Effectuer un déplacer/coller du contenu du dossier "symfony" dans le dossier TropiCamps créé suite au clonage, en ignorant le remplacement de fichier préexistant dans ce dernier dossier, de manière à préserver les fichiers issus du dépôt
- paramétrer la connexion à la base de donnée dans le fichier `/app/config/parameters.yml`
- importer la base de données vers mySql (import.sql) ou autrement, juste mettre à jour l'architecture en executant depuis la console à la racine du dossier cloné : `php app/console doctrine:schema:update --force`
- enfin consulter la page d'accueil en localhost : [mode dev](http://localhost:8888/TropiCamps/web/app_dev.php)

### Fichier bien commenté
Fichier lié à toute la gestion des données, la partie admin
`/src/Tropi/CampsBundle/Controller/StaffController.php`