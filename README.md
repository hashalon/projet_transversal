# projet_transversal
## Cahier des charges
Le cahier des charges devra être complété en fonction des directives du sujet et des choix technologiques que nous avons fait et devra être présenté à notre première présentation.

#### Jalon 1: Lancement: 4 février
- réponse à la problématique (siteweb ou application)
- description des choix technologiques (siteweb, mysql, php, bootstrap, js, svg)
- études préalables pour répondre au problème (étude des données fournises, sélection de données additionnelles, étude des possiblités bootstrap, étude des interactions js/svg)
- découpage des tâches (WBS)
- répartition des tâches (Matrice RACI)
- GANTT
- Rendre diaporama

#### Jalon 2: Intermédiaire: 11 mars
- Pour chaque tâche identifiée:<ul>
  <li>pourcentage de la tâche accomplie</li>
  <li>productions (prototype, code, tests, documentations, etc.)</li>
  <li>difficultés rencontrées (techniques, humaines)</li>
</ul>
- Modification apportée au projet (?)
- Ce qu'il reste à faire
- Rendre diaporama

#### Jalon 3: Recette: 1 avril
- Diaporama:<ul>
  <li>résultats</li>
  <li>démonstration</li>
  <li>retour d'expérience technologique et organisationnel</li>
</ul>
- Rendre diaporama
- Rendre :<ul>
  <li>codes sources</li>
  <li>exécutable ou lien web</li>
  <li>base de données (création de scéma, insertion des données, création d'utilisateurs)</li>
  <li>processus d'installation</li>
</ul>


## fonctionnalités
Ce que l'on doit pouvoir faire sur notre site web

#### Directives:
- Utiliser les données de l'INSEE (Base-cc-resume-stat-11.xls 34 indicateurs sur 36681 communes de France)
- Utiliser un autre fichier: <ul>
  <li>https://www.data.gouv.fr/fr/</li>
  <li>http://www.regardscitoyens.org/open-data-en-france/</li>
</ul>

- Définir notre vision du dynamisme d'un territoire
- Produire un système d'information portant sur le dynamisme des territoires( "Quelles sont les villes les plus dynamiques dans telle région ?", "Quels sont les régions les plus dynamiques ?")

- Tableaux de bord (visualisations : camemberts, histogrammes, cartes de France)
- Pouvoir choisir le niveau de détail (France entière, une région, un département, une commune)
- Choisir les critères et les pondérations (chômage, natalité, habitants)

#### Solutions possibles
- Le site doit proposer, une inscription-connexion des utilisateurs -> utilisation d'un framework php (symphony)
- On doit pouvoir choisir le niveau de détail -> cartes svg interactive et graph (Raphaël.js)
- On doit rajouter des données venant d'un autre fichier à celles de l'INSEE, il font donc créer une database normalisé
- Pour la mise en page, on peut faire un système à trois panneaux:
<table>
  <tr><td colspan="2">Onglets</td></tr>
  <tr><th colspan="2">Barre de menu pour naviguer sur le site</th></tr>
  <tr>
    <td>panneau d'options</td>
    <td>carte interactive / graphes</td>
  </tr>
</table>

#### Points de pondérations sélectionné:
- Population active
<ul>
<li>Travailleurs</li>
<li>Chômeurs</li>
</ul>

- Population
<ul>
<li>Natalité</li>
<li>Mortalité</li>
</ul>

- Revenus (Salaire)
<ul>
<li>Nombre de ménages</li>
<li>Revenus fiscaux</li>
</ul>

- Établissements actifs
<ul>
<li>Grandes entreprises et établissements</li>
</ul>

- Éducation et Recherche
<ul>
<li>Nombre d'établissements</li>
<li>Élèves , Enseignants</li>
<li>Diplôme ,Formation</li>
</ul>

- Agriculture
<ul>
<li>Revenus et productions agricoles</li>
</ul>


### Liens utiles
- http://openclassrooms.com/
- http://www.w3schools.com/
- http://symfony.com/
- http://getbootstrap.com/
- http://lesscss.org/
- http://raphaeljs.com/
