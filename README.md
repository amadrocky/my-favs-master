# 🔥 Le projet

Le mini-projet proposé a pour but la mise en place d'APIs REST permettant à un utilisateur de gérer une liste d'utilisateurs favoris.

Le stockage des données se fait en MySql.

Les fonctionnalités attendues sont :

- Lister les contacts favoris d'un utilisateur
- Ajouter un utilisateur en favori
- Supprimer un utilisateur des favoris
- Ajouter une description à un favori
- Modifier la description d'un favori
- Supprimer la description d'un favori

Avant de commencer le développement lancer les tests unitaires, si les tous les tests passe vous pouvez vous lancer.

---

# 💪 Code produit

Afin que le code produit nous soit accessible pour évaluation il faut forker ce repo en privé.

## 🧑‍🚀 Nos attentes

Ce qui est attendu au niveau du code produit :

- Au fur et à mesure de l'avancée dans le test, il est recommandé de régulièrement commiter et pusher sur ce repo
- Il est préférable d'avoir 3 APIs complètement fonctionnelles plutôt que 6 APIs à semi-fonctionnelles
- Un code fonctionnel POO utilisant composer pour gérer les dépendances
- Une gestion standardisée des erreurs
- Des tests (unitaires, d'intégration, e2e, ...)
- Les fichiers sql nécessaires à la création des structures de données et à leur approvisionnement
- Les cUrls (ou ressources Postman ou autre) nécessaires pour tester manuellement les APIsLes commandes d'exécution des tests
- Tout autre document ou information utiles (un readme par exemple synthétisant certains des points précédents)

## 🚀 Les plus non-négligeables

Au-delà d'un code qui réponde aux besoins fonctionnels, nous accorderons également une importance particulière aux points suivants :

- Fréquence, taille et clarté des commits
- Lisibilité et organisation du code
- Code testé et TDD
- Performance applicativeDocumentation et annotation du code
- De possibles pistes d'optimisation ou d'améliorations

# ⚒️ L'outillage

Ci-dessous est expliqué comment utiliser le framework fourni afin de mener à bien ce projet.

## Directory structure

      config/             contains application configurations
      controllers/        contains Web controller classes
      models/             contains model classes
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      db/                 contains database files

## Requirements

The minimum requirement by this project template that your Web server supports PHP 5.6.0.

## Installation

- `composer install`
- setup database
- setup postman

## Web server

⚠️ The project have a web server integrated, do not use WAMP 

Launch web server `php yii serve --port=8080`

You can use your browser to access the server with the following URL: http://localhost:8080/

⚠️ Running project on a virtual machine 
`php yii serve 0.0.0.0 --port=8080` on browser : http://VMIpAddress:8080/

## Configuration

### Resources

      dump.sql                      contains the database schema
      postman_collection.json       contains basic api calls

### Database

Edit the file `config/db.php` with our database config

### Tests

Edit function `createServiceAPI` in the file `tests/api/AbstractApiTest.php` with our configuration

launch tests `php ./vendor/bin/phpunit`

### Routing

`config/routes`

### Authentication

Use token bearer
