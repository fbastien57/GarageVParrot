GarageVPerroquet
ECF DevWeb GarageVParrot Référence : EVALENTRECFccp1TPDWWMGDA_330669_20230611230814 le site web se trouve sur la branche master
pour se connecter en admin sur le site web https://garagevparrot57.fr      email:admin22@admin.com  mdp: V123456

La charte graphique et la documentation technique sont dans le dossier ECF_DOC (branche principale)

comment utiliser le site web sur un serveur local :

Créer un projet Symfony dans votre éditeur de code (vscode)

copier les documents de mon projet sur votre projet

Installer toutes les dépendances nécessaires

démarer votre serveur local (mamp ou xampp) appach + mysql

modifier le fichier env.local en entrant les informations de votre base de données

une fois connecté à la base de données , faire une création de base de données php bin/console doctrine:database:create, faire une doctrine:database diff puis une doctrine:migraion:migrate vos tables ont été créées en fonction de vous entité.

Ajouter un profil admin pour naviguer sur le site comme administrateur avec la commande : php bin/console doctrine:fixtures:load

Lancer le serveur symfony avec la commande : $ symfony server:start _d cliquer sur l'adresse qui s'affiche dans le terminal pour au site

La base de données étant vide , le site le sera aussi ,

il faut se rendre sur toute les pages d'administration en se connectant avec les identifiants créés par la datafixture . Vous pouvez naviguer sur le site : créer des véhicules et les filtres , créer un utilisateur employé , écrire , publier ou supprimer des commentaires créer des services et des horaires .....
