---

## Installation du Projet Laravel depuis GitHub

1. **Cloner le Projet :**
   - Ouvrez une invite de commande (cmd) ou Git Bash dans le dossier ou vous souhaiter avoir le projet.
   - Utilisez la commande `git clone https://github.com/LeoSLegrand/UserStoryGroupe.git` pour cloner le projet depuis GitHub.

2. **Accéder au Répertoire du Projet :**
   - Naviguez vers le répertoire du projet cloné en utilisant la commande `cd UserStoryGroupe`.

3. **Installer les Dépendances :**
   - Exécutez la commande `composer install` pour installer les dépendances PHP.

4. **Configurer le Fichier d'Environnement :**
   - Renommez le fichier `.env.example` en `.env`.
   - Configurez les paramètres de connexion à la base de données dans le fichier `.env`.
        - Apportez une attention particulière à cette section de `.env` :

            ``
            DB_CONNECTION=mysql
            DB_HOST=127.0.0.1
            DB_PORT=3306
            DB_DATABASE=userstory
            DB_USERNAME=root
            DB_PASSWORD=
            ``
            <br>

## Utilisation de WAMP et 'php artisan serve'

1. **Configurer WAMP :**
   - Assurez-vous que WAMP est installé et en cours d'exécution sur votre machine.

2. **Exécution de 'php artisan serve' :**
   - Ouvrez une invite de commande dans le répertoire du projet Laravel.
   - Exécutez la commande `php artisan serve`.
   - Cela lancera un serveur de développement Laravel sur `http://localhost:8000`.

3. **Exécution de 'npm run dev' :**
   - Ouvrez une autre invite de commande, assurez-vous d'être toujours dans le répertoire de votre projet Laravel.
   - Exécutez la commande `npm run dev`.
   - Si la commande échoue, exécutez la commande `npm install` puis relancer la commande `npm run dev`.
   - Gardez cette commande en cours d'exécution en parallèle avec `php artisan serve`.

4. **Accéder à l'Application :**
   - Ouvrez votre navigateur Web et copier l'url `http://localhost:8000` pour accéder à l'application Laravel en cours d'exécution.

<br>

## Migration de la Base de Données

1. **Créer la Base de Données :**
   - Assurez-vous que votre serveur de base de données est en cours d'exécution.
   - Créez une nouvelle base de données correspondant au nom spécifié dans votre fichier `.env` (ici *userstory* si vous aver bien copier le contenu .env plus haut).

2. **Exécuter les Migrations :**
   - Dans le terminal, exécutez la commande `php artisan migrate` pour exécuter toutes les migrations de base de donnée.
   - Cela créera les tables nécessaires dans votre base de données.

---
