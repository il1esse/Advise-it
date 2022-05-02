# LIFPROJET_RC3_ADVISEIT

 
(Ce fichier est en .md pour profiter des balises Markdown je vous conseille de l'ouvrir avec vscode et d'appuyer sur ctrl+shift+V)



Le projet consiste à réaliser un algorithme de recommandation.

Nous avons décidé de choisir la base de données de film "the-movie-dataset" car elle possède une grande quantité de film et plusieurs utilisateurs ayant déjà notés des films.

Concernant l'algorithme de recommandation nous avons traité le problème de deux manières ; 

- En ne traitant que la similarité entre les films (basés sur les notes globales des utilisateurs)

- De manière collaborative en traitant la similarité précédente et les notes attribuées par l’utilisateur concerné.

Afin d'évaluer la précision de notre algorithme nous avons utilisé le Roc auc score. Cette méthode nous renvoie une valeur allant de 0 à 1, plus on est proche de 1 plus l'algorithme est précis. 

On récupère un tableau de recommandation de film basé sur les films noté par l'utilisateur en enlevant un film de sa liste. On essaye ensuite de prédire quel film on a enlevé. On regarde donc dans le tableau de recommandation la place du film que l'on  a retiré. Plus elle est haute dans la liste de recommandation plus notre méthode de recommandation est précise. 


L'algorithme est divisé en 4 grandes fonctions : 

- top100 : Renvoi le top 100 des recommandations de film pour un utilisateur donné en fonction des films qu'il a noté.

- top1000ratings : Renvoi le top 100 des recommandations de film pour un utilisateur donné en fonction des films qu'il a notés et de la note qu'il a attribuée à ses films.

- RocGlobal : Renvoi le score moyen du Roc auc score pour un utilisateur en fonction des films qu'il a noté.

- RocGlobalRatings : Renvoi le score moyen du Roc auc score pour un utilisateur en fonction des films qu'il a 		notés et de la note qu'il a attribuée à ses films.

Nous avons réalisé un site web pour mettre en situation notre algorithme. 

Ce site est composé de : 

D'un formulaire d'inscription et de connexion lié à une base de données mysql

affichage des tableaux de films recommandés en fonction de l'user connecté, l'user1, l'user2 et les autres users

  
## Organisation des fichiers

/csv fichier contenant tous les .csv pour afficher les films recommandés pour l'utilisateur 1 , 2 et les autres
/racine contient tous les fichiers PHP nécessaire aux fonctionnements du site
/css contient bootstrap
  


## Exigences


Aucune exigence particulière.
 

## Usage

Deux utilisateurs sont créés par défaut sur la base de donnée
pseudo:user1 mdp:user1
pseudo:user2 mdp:user2

Possibilité d'inscrire d'autres utilisateurs en cliquant sur le bouton inscription (affichage d'un formulaire)

Il y a 2 boutons:
Le 1er "rating" affiche le top 100 des films recommandés pour l'utilisateur donné en fonction des films qu'il a notés et de la note qu'il a attribuée à ses films
Le 2ème "sans ratings" affiche le top 100 des films recommandés pour l'utilisateur donné en fonction des films qu'il a notés.

  

## Auteurs

VINCENT/Yann/11906701
ANDRE-LUBIN/Keryann/11914561
CHAPUT/Jean/11909181
LARIBI/Iliesse/11911241