# GarageVParrot
ECF DevWeb GarageVParrot
Référence : EVALENTRECFccp1TPDWWMGDA_330669_20230611230814
le site web se trouve sur la branch master

La charte graphique et la documentation téchnique sont dans le dossier ECF_DOC (branche principal)

comment utiliser le site web sur un serveur local:

Créer un projet Symfony dans votre éditeur de code (vscode)

copier les documents de mon projet sur votre projet

Installer toutes les dépendances nécessaires 

démarrer votre serveur local (mamp ou xampp) appach + mysql

modifier le fichier env.local en entrant les informations de votre base de donnée

une fois connecté a la base de donnée , faire une creation de base de donnée php bin/console doctrine:database:create,
faire un doctrine:database diff puis un doctrine:migration:migrate
vos tables ont été créer en fonction de vos entités.

Ajouter un profil admin pour naviguer sur le site comme administrateur avec la commande : php bin/console doctrine:fixtures:load 

Lancer le serveur symfony avec la commande : $ symfony server:start-d

cliquer sur l'adresse qui s'affiche dans le terminal pour accéder au site 

La base de donnée etant vide , le site le sera aussi ,

il faut se rendre sur toute les pages d'administration en se connectant avec les identifiants creer par la datafixture .
Vous pouvez naviguer sur le site : 
                                    creer des véhicules et les filtrer ,
                                    creer un utilisateur employé ,
                                    ecrire , publier ou supprimer des commentaires
                                    creer des services et des horaires 
                                    .....

