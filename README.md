# Architecture PHP MVC Boilerplate

## Vue d'Ensemble
Ce projet offre une architecture PHP MVC propre, modulaire et évolutive, conçue pour faciliter le développement d'applications web. Avec un accent particulier sur la séparation des responsabilités, la réutilisation du code et les bonnes pratiques, ce modèle est idéal pour créer des applications sécurisées, maintenables et extensibles.

## Fonctionnalités Principales

- **Système de Routage Avancé**  
  Un routeur personnalisé pour gérer les requêtes de manière flexible.

- **Séparation des Responsabilités**  
  Structure MVC bien organisée avec des Modèles, Contrôleurs et Vues.

- **Connexion à la Base de Données**  
  Connexion sécurisée à PostgreSQL via PDO pour des interactions fiables avec la base de données.

- **Système d'Authentification**  
  Authentification des utilisateurs robuste utilisant des sessions, des tokens et des permissions.

- **Contrôle d'Accès Basé sur les Rôles (ACL)**  
  Gestion fine des permissions et de l'accès des utilisateurs.

- **Moteur de Templates Twig**  
  Pour des vues front-end organisées, réutilisables et propres.

- **Injection de Dépendances**  
  Gestion simplifiée des services avec un conteneur d'injection de dépendances.

- **Sécurisation**  
  Protection contre les injections SQL, XSS, les tokens CSRF et gestion sécurisée des sessions.

- **Gestion des Erreurs**  
  Journalisation centralisée des erreurs et gestion cohérente des réponses d'erreur.

- **Validation**  
  Inclut une classe Validator pour une validation sécurisée des entrées.

- **Configuration .htaccess**  
  Pour la réécriture des URL et l'amélioration de la sécurité.

## Structure des Dossiers

```bash
/projet-mvc-php

│── public/               # Dossier public (accessible via le navigateur)
│   ├── index.php         # Point d'entrée de l'application
│   ├── .htaccess         # Réécriture d'URL et configurations de sécurité
│   ├── assets/           # Fichiers CSS, JS, images

│── app/                  # Code principal de l'application
│   ├── controllers/      # Contrôleurs (logique métier)
│   │   ├── front/        # Contrôleurs pour le Front Office
│   │   ├── back/         # Contrôleurs pour le Back Office (administration)
│   ├── models/           # Modèles (interactions avec la base de données)
│   ├── views/            # Fichiers templates pour les vues
│   ├── core/             # Classes principales (Router, Controller, etc.)
│   ├── config/           # Configuration de l'application

│── logs/                 # Fichiers de log des erreurs et accès
│── vendor/               # Dépendances gérées par Composer
│── .env                  # Variables d'environnement
│── composer.json         # Gestion des dépendances avec Composer
│── .gitignore            # Fichiers à ignorer par Git
