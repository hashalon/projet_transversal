<?php  ?>

<!-- cette div contient notre panneau gauche qui contient les différents boutons pour choisir les options d'affichages-->
<!-- Nous devrons définir les classes de ce panneaux pour que celui-ci s'adapte correctement aux différentes tailles d'écran -->
<!-- PANNEAU GAUCHE -->
<div class="col-sm-3">
    <form role="form" class="accordion" id="options">


        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle btn btn-primary btn-small btn-block" data-toggle="collapse" data-parent="#options" href="#collapse0">
                    Population active
                </a>
            </div>
            <div id="collapse0" class="accordion-body collapse">
                <div class="accordion-inner">
                    <div class="radio radio-blue">
                        <input id="travailleurs" name="pond" type="radio" onclick="ponderate(this, '#2177c1')">
                        <label for="travailleurs">Travailleurs</label>
                    </div>
                    <div class="radio radio-red">
                        <input id="chomeurs" name="pond" type="radio" onclick="ponderate(this, '#e0211b')">
                        <label for="chomeurs">Chômeurs</label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle btn btn-primary btn-small btn-block" data-toggle="collapse" data-parent="#options" href="#collapse1">
                    Population
                </a>
            </div>
            <div id="collapse1" class="accordion-body collapse">
                <div class="accordion-inner">
                    <div class="radio radio-yellow">
                        <input id="natalite" name="pond" type="radio" onclick="ponderate(this, '#d1d12e')">
                        <label for="natalite">Natalité</label>
                    </div>
                    <div class="radio radio-grey">
                        <input id="mortalite" name="pond" type="radio" onclick="ponderate(this, '#777777')">
                        <label for="mortalite">Mortalité</label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle btn btn-primary btn-small btn-block" data-toggle="collapse" data-parent="#options" href="#collapse2">
                    Revenus (Salaire)
                </a>
            </div>
            <div id="collapse2" class="accordion-body collapse">
                <div class="accordion-inner">
                    <div class="radio radio-cyan">
                        <input id="nbMenages" name="pond" type="radio" onclick="ponderate(this, '#14ebe3')">
                        <label for="nbMenages">Nombre de ménages</label>
                    </div>
                    <div class="radio radio-green">
                        <input id="revenusFiscaux" name="pond" type="radio" onclick="ponderate(this, '#17aa22')">
                        <label for="revenusFiscaux">Revenus fiscaux</label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle btn btn-primary btn-small btn-block" data-toggle="collapse" data-parent="#options" href="#collapse3">
                    Etablissements actifs
                </a>
            </div>
            <div id="collapse3" class="accordion-body collapse">
                <div class="accordion-inner">
                    <div class="radio radio-colbat">
                        <input id="entreprises" name="pond" type="radio" onclick="ponderate(this, '#2c3beb')">
                        <label for="entreprises">Grandes entreprises et établissements</label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle btn btn-primary btn-small btn-block" data-toggle="collapse" data-parent="#options" href="#collapse4">
                    Education et Recherche
                </a>
            </div>
            <div id="collapse4" class="accordion-body collapse">
                <div class="accordion-inner">
                    <div class="radio radio-purple">
                        <input id="eleves" name="pond" type="radio" onclick="ponderate(this, '#6128cc')">
                        <label for="eleves">Elèves, Enseignants</label>
                    </div>
                    <div class="radio radio-lime">
                        <input id="diplome" name="pond" type="radio" onclick="ponderate(this, '#82de16')">
                        <label for="diplome">Diplôme, Formation</label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle btn btn-primary btn-small btn-block" data-toggle="collapse" data-parent="#options" href="#collapse5">
                    Agriculture
                </a>
            </div>
            <div id="collapse5" class="accordion-body collapse">
                <div class="accordion-inner">
                    <div class="radio radio-orange">
                        <input id="prodAgricoles" name="pond" type="radio" onclick="ponderate(this, '#ea9722')">
                        <label for="prodAgricoles">Revenus et productions agricoles</label>
                    </div>
                </div>
            </div>
        </div>


    </form>
</div>