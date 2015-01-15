# projet_transversal
## Cahier des charges
Le cahier des charges devra être complété en fonction des directives du sujet et des choix technologiques que nous avons fait et devra être présenté à notre première présentation.

#### Jalon 1: Lancement: 4 février
réponse à la problématique (siteweb ou application)
description des choix technologiques (siteweb, mysql, php, bootstrap, js, svg)
études préalables pour répondre au problème (étude des données fournises, sélection de données additionnelles, étude des possiblités bootstrap, étude des interactions js/svg)
découpage des tâches (WBS)
répartition des tâches (Matrice RACI)
GANTT
Rendre diaporama

#### Jalon 2: Intermédiaire: 11 mars
Pour chaque tâche identifiée:
- pourcentage de la tâche accomplie
- productions (prototype, code, tests, documentations, etc.)
- difficultés rencontrées (techniques, humaines)
Modification apportée au projet (?)
Ce qu'il reste à faire
Rendre diaporama

#### Jalon 3: Recette: 1 avril
Diaporama:
- résultats
- démonstration
- retour d'expérience technologique et organisationnel
Rendre diaporama
Rendre :
- codes sources
- exécutable ou lien web
- base de données (création de scéma, insertion des données, création d'utilisateurs)
- processus d'installation


## fonctionnalités
Ce que l'on doit pouvoir faire sur notre site web

#### Directives:
Utiliser les données de l'INSEE (Base-cc-resume-stat-11.xls 34 indicateurs sur 36681 communes de France)
Utiliser un autre fichier:
- https://www.data.gouv.fr/fr/
- http://www.regardscitoyens.org/open-data-en-france/

Définir notre vision du dynamisme d'un territoire
Produire un système d'information portant sur le dynamisme des territoires( "Quelles sont les villes les plus dynamiques dans telle région ?", "Quels sont les régions les plus dynamiques ?")

Tableaux de bord (visualisations : camemberts, histogrammes, cartes de France)
Pouvoir choisir le niveau de détail (France entière, une région, un département, une commune)
Choisir les critères et les pondérations (chômage, natalité, habitants)

#### Solutions possibles
Le site doit proposer, une inscription-connexion des utilisateurs -> utilisation d'un framework php (symphony)
On doit pouvoir choisir le niveau de détail -> cartes svg interactive et graph (Raphaël.js)
On doit rajouter des données venant d'un autre fichier à celles de l'INSEE, il font donc créer une database normalisé
Pour la mise en page, on peut faire un système à trois panneaux:
<table>
  <tr><th colspan="3">Barre de menu pour naviguer sur le site</th></tr>
  <tr>
    <td>panneau d'options</td>
    <td>carte interactive</td>
    <td>panneau d'options</td>
  </tr>
</table>

#### Ce qui est encore flou
Pourquoi s'inscrire ? (Que peut-on faire une fois inscrit, qu'on ne pouvait pas faire avant ?)
Quel type de graphs sont demandé ? (Seulement diagrames, histogrames ou cartes OU les trois en même temps ?)
Doit-on réfléchir à l'esthétique ? (L'esthétisme est-elle une composante importante de l'IHM ?)
Doit-ton gérer les DOM-TOM ?
D'autre questions possibles ...?

### Liens utiles
- http://openclassrooms.com/
- http://www.w3schools.com/
- http://symfony.com/
- http://getbootstrap.com/
- http://lesscss.org/
- http://raphaeljs.com/
