# Documentation du Projet Daily Tasks API

## Introduction

Le projet Daily Tasks API est une plateforme permettant de gérer des quêtes quotidiennes pour les utilisateurs, similaire à un système de gamification. Les utilisateurs peuvent accomplir des tâches (quêtes), marquer les quêtes comme terminées, et suivre leurs progrès. Le projet est construit avec Symfony, Doctrine ORM et API Platform pour exposer une API RESTful.

## Fonctionnalités Principales

- **Gestion des utilisateurs** : Permet la création et la gestion des utilisateurs.
- **Gestion des quêtes** : Les utilisateurs peuvent consulter, accomplir et suivre des quêtes.
- **Gamification** : Les quêtes sont accompagnées de fonctionnalités de suivi, de récompenses et de motivation.
- **API RESTful** : L’API exposée permet d’interagir avec les données des utilisateurs et des quêtes via des requêtes HTTP.

## Prérequis

Pour installer et faire fonctionner le projet, vous devez disposer des éléments suivants :

- PHP version 8.2 ou supérieure
- Composer pour gérer les dépendances PHP
- Symfony CLI pour faciliter l’utilisation du framework Symfony
- MySQL ou toute autre base de données compatible avec Doctrine

## Installation

### Étape 1 : Cloner le dépôt

Clonez le dépôt GitHub contenant le projet à l’aide de la commande suivante :

```bash
git clone https://github.com/Adrrien04/DailyTasksBACK
cd DailyTasksBACK
```
Pour lancer le front clonez ce repo, pour suivre l'installation du front suivez le readme disponible sur le repo du front :
```bash
git clone https://github.com/Adrrien04/DailyTasksFRONT
cd DailyTasksFRONT
```
https://github.com/Adrrien04/DailyTasksFRONT

### Étape 2 : Installer les dépendances

Installez toutes les dépendances du projet en utilisant Composer :

```bash
composer install
```

### Étape 3 : Configurer les variables d’environnement

Le projet utilise un fichier `.env` pour la configuration. Vous devrez configurer la base de données et d’autres paramètres nécessaires.

Copiez le fichier `.env` en `.env.local` :

```bash
cp .env .env.local
```

Modifiez les variables nécessaires dans `.env.local`, en particulier la configuration de la base de données :

```env
DATABASE_URL="mysql://root:root@127.0.0.1:3306/daily_tasks?serverVersion=8.0&charset=utf8mb4"
```

### Étape 4 : Exécuter les migrations

Le projet utilise Doctrine Migrations pour gérer la base de données. Exécutez la commande suivante pour appliquer les migrations :

```bash
php bin/console doctrine:migrations:migrate
```

## Démarrage du Serveur

Une fois l’installation terminée, vous pouvez démarrer le serveur Symfony en utilisant la commande suivante :

```bash
symfony server:start
```

Cela démarrera le serveur localement, et vous pourrez accéder à l’API et à l’application via [http://localhost:8000](http://localhost:8000).

## Structure du Projet

Voici un aperçu de la structure des répertoires du projet :

```
daily-tasks/
    .env                     
    bin/
        console              
    config/
        routes.yaml          
        services.yaml        
    migrations/
        
    public/
        index.php            
    src/
        Controller/          
        Entity/              
        Repository/         
    templates/               
    var/                    
    vendor/                  
    README.md                
```

## Endpoints de l’API

Voici un aperçu des endpoints exposés par l’API pour interagir avec le système de quêtes.

### Utilisateurs

- `GET /api/users` : Récupère la liste des utilisateurs.
- `POST /api/users` : Crée un nouvel utilisateur.

### Quêtes

- `GET /api/quests` : Récupère la liste des quêtes.
- `POST /api/quests` : Crée une nouvelle quête.
- `POST /api/mark_quest_done/{id}` : Marque une quête comme terminée.

## Commandes Symfony

Le projet inclut des commandes Symfony pour la gestion des quêtes et des utilisateurs :

- **AssignDailyQuestsCommand** : Attribue 5 quêtes aléatoires à chaque utilisateur tous les jours.

Pour exécuter cette commande, utilisez la commande suivante dans le terminal :

```bash
php bin/console app:assign-daily-quests
```

Cela attribuera des quêtes à tous les utilisateurs, qui pourront ensuite les marquer comme terminées via l’API.

## Exécution des Tests

Pour exécuter les tests du projet, vous pouvez utiliser PHPUnit. Voici la commande pour l’exécuter :

```bash
vendor/bin/phpunit
```

## Contribution

Si vous souhaitez contribuer au projet, suivez ces étapes :

1. Forkez le dépôt.
2. Créez une nouvelle branche pour votre fonctionnalité :

    ```bash
    git checkout -b feature/nouvelle-fonctionnalité
    ```

3. Apportez vos modifications et commitez-les :

    ```bash
    git commit -m "Ajout de ma fonctionnalité"
    ```

4. Poussez votre branche :

    ```bash
    git push origin feature/nouvelle-fonctionnalité
    ```

5. Ouvrez une Pull Request sur le dépôt principal.

## Licence

Le projet est sous Licence MIT. Vous pouvez l’utiliser, la modifier et la redistribuer selon les termes de cette licence.

---

