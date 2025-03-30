# Tweet Académie

Tweet Académie est un projet de réseau social inspiré de Twitter, développé en PHP, HTML/CSS et JavaScript. Il permet aux utilisateur de se connecter, de publier des tweets, de suivre d'autres membres et d'interagir avec la communauté.

## Pré-requis
Il faudra une server SQL pour pouvoir intéragir avec la base de données du projet.

## Installation

### 1. Cloner le projet
Il est nécessaire de cloner le projet vers le dossier suivant :
```sh
cd /chemin/vers/votre/dossier/www
```
Pour ensuite cloner le repo de la manière suivante:
```sh
git clone https://github.com/EpitechWebAcademiePromo2026/W-WEB-090-LIL-1-1-academie-abdellah1.djezzar.git
cd tweet-academie
```
### 2. Installation de la base de données
- (ATTENTION:le fichier SQL contient uniquement les données,il vous faudra créer sur votre serveur un nom de base de données et y importer les données.)
- Importez le fichier SQL `common-database.sql` situé à la racine du projet dans votre serveur MySQL(Ou via l'interface PhpMyAdmin) 
```sh
mysql -u root -p *Le nom de votre base de données* < common-database.sql
```
### 3. Configuration de l'environnement

- Créez un fichier `.env` à la racine du projet et ajoutez-y les informations de connexion à la base de données :

```
DB_HOST=localhost
DB_NAME=LeNomDeVotreBaseDeDonnées
DB_USER=VotreNomUtilisateur
DB_PASS=VotreMotDePasseSiNécessaire
```
### 4. Démarrer le serveur

- Utilisez un serveur local comme Apache avec PHP activé (via XAMPP, MAMP ou autre) et accédez au projet depuis :
```
http://localhost/tweet-academie/public/index.php
```

## Technologies utilisés
- HTML/CSS
- PHP
- FRAMEWORK(Boostrap)
- SQL
- Javascript

## Fonctionnalités

- Inscription et connexion sécurisée (hashage RIPMD160)
- Publier des tweets (140 caractères max)
- Ajouter des hashtags `#` et des mentions `@`
- Recherche de tags
- Modifications d'informations personnelles(Nom de compte,email,mot de passe)
- Vérification(Javascript) des champs(Inscription et connexion)

---
**Auteur :** [Djezzar Abdellah | Bryan Salomé | Ethan Carpentier | Clémence Neuvy / Les licornes 2]  
 Projet réalisé dans le cadre de la formation Web@cadémie 2024-2026
