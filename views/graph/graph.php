<?php

$sideMenu = [
    'Population active' => [
        'Actifs' => [ 'pop active', 'grey', '#fff', '#444', '#000' ],
        'Travailleurs' => [ 'trav', 'grey', '#fff', '#444', '#000' ],
        'Chômeurs' => [ 'chom', 'grey', '#fff', '#444', '#000' ],
        'Taux de Chômage' => [ 'taux chom', 'grey', '#fff', '#444', '#000' ],
    ],
    'Population' => [
        'Habitants' => [ 'pop', 'grey', '#fff', '#444', '#000' ],
        'Natalité' => [ 'naiss', 'grey', '#fff', '#444', '#000' ],
        'Mortalité' => [ 'deces', 'grey', '#fff', '#444', '#000' ],
        'Croissance Demographique' => [ 'var demo', 'grey', '#fff', '#444', '#000' ],
    ],
    'Logements' => [
        'Logements' => [ 'loge', 'grey', '#fff', '#444', '#000' ],
        'Ménages' => [ 'mena', 'grey', '#fff', '#444', '#000' ],
    ],
    'Fiscalité' => [
        'Ménages fiscaux' => [ 'mena fisc', 'grey', '#fff', '#444', '#000' ],
        'Personnes dans les ménages fiscaux' => [ 'pers in mena fisc', 'grey', '#fff', '#444', '#000' ],
        'Personnes par ménage fiscal' => [ 'pers in mena fisc', 'grey', '#fff', '#444', '#000' ],
    ],
    'Etablissement actifs' => [
        'Grandes entreprises et établissement' => [ 'etabl', 'grey', '#fff', '#444', '#000' ],
    ],
    'Education et Recherche' => [
        'Diplôme, Formation' => [ 'dipl', 'grey', '#fff', '#444', '#000' ],
    ],
];
$dataCharts =[['Travailleur',200],
              ['chômeur',50]

             ];

?>

<script src="web/js/charts/highcharts.js"></script>
<script src="web/js/charts/modules/exporting.js"></script>
<script src="web/js/charts/themes/dark-unica.js"></script>
<script src="web/js/createGraph.js"></script>
<script>
    var data = 
        function ponderate(input, year, start, middle, end){
            // we get data for the right map, with the right detail mode
            $(document).ready(function(){
                dbGetter.colors = [ start, middle, end ];
                dbGetter.getData( "<?= $map ?>", "<?= $detail ?>", input, year );
            });
        };

    $(function () {
        
        
        createGraph("pie",
                    "#graphPop",
                    "Populatio active",
                    "Données du gourvernement",
                    "Nombre de personnes",
                    "",
                    "",
                    [
            ['Travailleur',200],
            ['chômeur',50]
        ]);
        createGraph("pie",
                    "#graphDesc1",
                    "Populatio active",
                    "Données du gourvernement",
                    "Nombre de personnes",
                    "",
                    "",
                    [
            ['Travailleur',200],
            ['chômeur',50]
        ]);
        createGraph("pie",
                    "#graphDesc2",
                    "Populatio active",
                    "Données du gourvernement",
                    "Nombre de personnes",
                    "",
                    "",
                    [
            ['Travailleur',200],
            ['chômeur',50]
        ]);
         createGraph("column",
                    "#graphDesc3",
                    "Populatio active",
                    "Données du gourvernement",
                    "Nombre",
                    "tata",
                    ['type de personnes','autre'],
                    [{
            name: 'Travailleur',
            data: [100.9]

        }, {
            name: 'Chômeur',
            data: [42.4]

        }]);
        /*
    */
    });
</script>

<div class="row">
    <div class="container">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#sectionA">Description</a></li>
            <li><a data-toggle="tab" href="#sectionB">Création</a></li>

        </ul>
        <div class="tab-content col-sm-12">
            <div id="sectionA" class="tab-pane fade in active">

                <h3>Données Graphique</h3>
                <section class="col-sm-6">

                    <div id="graphDesc1" style="width: auto; height: 400px; margin: 0 auto"></div>
                </section>
                <section class="col-sm-6">

                    <div id="graphDesc2" style="width: auto; height: 400px; margin: 0 auto"></div>
                </section>
                <section class="col-sm-6">

                    <div id="graphDesc3" style="width: auto; height: 400px; margin: 0 auto"></div>
                </section>
                <section class="col-sm-6">

                    <div id="graphDesc4" style="width: auto; height: 400px; margin: 0 auto"></div>
                </section>
            </div>



            <div id="sectionB" class="tab-pane fade">
                <h3>Création de graphique</h3>
                <section class="col-sm-9">



                    <div id="graphPop" style="max-width: 800px; height: 400px; margin: 0 auto"></div>

                </section>

                <aside class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Critères</div>
                        <div class="panel-body">

                            <form role="form" id="options">
                                <?php 
    $count = 0;
foreach( $sideMenu as $category => &$elements ){
                                ?>
                                <strong><?= $category ?></strong>

                                <?php
                                    foreach( $elements as $element => &$attr ){
                                ?>
                                <div class="checkbox">
                                    <input id="<?= $element ?>" name="critere" value="<?= $count++ ?>" type="checkbox"  >
                                    <label for="<?= $element ?>" ><?= $element ?></label>
                                </div>
                                <?php 
                                }
}
                                ?>
                                <!--div id="year_selector" class="btn-group" role="group" aria-label="year">
<button type="button" id="test" class="btn btn-default" onclick="ponderate(this, null,'#59c6e6', '#112aea', '#030b1f' )">Travail</button>
</div-->
                            </form>

                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>

</div>