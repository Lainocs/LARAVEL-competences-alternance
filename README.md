## Cas technique Magnétis

Voici un cas technique Magnétis afin de découvrir les outils utilisés et de valider le niveau technique en Laravel.

### Références

Laravel: Nous utiliserons la version 8 de Laravel. La documentation est disponible à l'adresse : https://laravel.com/docs/8.x

Boostrap : framework à utiliser pour concevoir l'interface utilisateur. Vous pouvez le charger en CDN. La documentation est disponible à l'adresse : https://getbootstrap.com/docs/4.5/getting-started/introduction/

### Fonctionnalités à ajouter

L'objectif est de réaliser un petit système de gestion des comptes clients.

Vous devrez : 

- Réaliser les migrations pour la création de deux tables :  

  - Accounts :
     - id
     - firstname
     - lastname
     - email (unique)
     - phone
     - address
     - zipcode
     - region
     - city
     - created_at
     - status

  - Timeline : 
    - id
    - account_id (foreign key)
    - action (enum: create, update, delete)
    - created_at

- Créer un AccountFactory et utiliser DatabaseSeeder pour créer 10 comptes de test. Vous pouvez utiliser faker pour générer les valeurs de la factory.

- Utilisez l'index de l'application pour afficher le listing des comptes clients dans un tableau avec les colonnes ID client | Nom | Email | Adresse | Actions. Ce tableau se réfère à la table accounts.

- Créer un bouton "Ajouter un nouveau compte client" qui dirige vers une page dédiée avec un formulaire d'ajout du compte. Les champs du formulaire sont ceux de la table accounts, sauf les champs id, created_at, region et status qui sont des champs automatiques.

- Pour créer ce formulaire, vous utiliserez l'API Adresse du gouvernement. La documentation est disponible à l'adresse : https://geo.api.gouv.fr/adresse.

- Dans la colonne Actions du tableau, ajouter deux boutons : un premier pour "Modifier" le compte client, et un second pour "Supprimer" le compte client.

- La modification d'un compte affiche une page avec un formulaire contenant les données à modifier.

- La suppression d'un compte client consiste en la mise en off du statut du client, et non en la suppression de la ligne dans la base de données. Une alerte de confirmation de suppression avant de l'effectuer sera la bienvenue.

- Chaque action réalisée devra être consignée dans la base de données dans la table timeline. Cette table permet de suivre l'historique des actions sur le compte client et devra être renseignée lors de l'ajout, la modification et la suppression d'un client.

- Toutes les vues doivent inclure les mêmes header et footer définis dans des fichiers à part.

Vous êtes libre de présenter et organiser les vues de votre application comme bon vous semble. Néanmoins, la propreté du code et l'ergonomie des pages seront prises en compte.

### Base de données et route

La base de données est pré paramétrée dans le fichier .env, exceptionnellement push sur Github.

### Publication du travail réalisé.

Le travail est à pusher dans GitHub dans une branche dédiée.

### Echanges

Vous pouvez joindre Alexandre à tout moment à l'adresse alexandre.jacq@magnetis.fr (avec antoine.durussel@magnetis.fr en copie) si vous avez des questions ou que vous êtes bloqué sur un point précis. Nous travaillons en équipe, il n'y a donc pas de problème à demander si une problématique se présente ou qu'une précision est nécessaire.
