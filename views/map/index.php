<?php
use yii\helpers\Html;

    $sideMenu = [
        'Population active' => [
            'Travailleurs' => [ 'blue', '#59c6e6', '#112aea', '#030b1f' ],
            'Chômeurs' => [ 'red', '#edc2be', '#e61f18', '#4e0f0f' ],
        ],
        'Population' => [
            'Natalité' => [ 'yellow', '#e5e5c7', '#e6e618', '#332207' ],
            'Mortalité' => [ 'grey', '#dedede', '#585858', '#292929' ],
        ],
        'Revenus (Salaire)' => [
            'Nombre de ménages' => [ 'cyan', '#bbe2e0', '#00fff6', '#1a3835' ],
            'Revenus fiscaux' => [ 'green', '#9bdea1', '#1ddd2b', '#04210b' ],
        ],
        'Etablissement actifs' => [
            'Grandes entreprises et établissement' => [ 'colbat', '#b9c0db', '#1b2add', '#05082c' ],
        ],
        'Education et Recherche' => [
            'Elèves, Enseignants' => [ 'purple', '#c1b2dd', '#5e19de', '#160426' ],
            'Diplôme, Formation' => [ 'lime', '#dbe5cf', '#84de1c', '#1d2c05' ],
        ],
        'Agriculture' => [
            'Revenus et productions agricoles' => [ 'orange', '#e2dbc1', '#e28d19', '#52140f' ],
        ],
    ];
    
    $map_id = "Nord-Pas-de-Calais";
    $detail = "departements";
    
?>
<script>
    window.onload = function () {
        // TODO rename the id of the g group of each svg file to "Map"
        //mapColor.init("#Map");
        mapColor.init(<%= "#".$map_id %>, "#Legend");
    };
    
    // TODO, make a function to load data
    var data = {};
    data["Nord-Pas-de-Calais"] = -100;

    function ponderate(input, start, middle, end){
        //var color;
        // we should select the right data to display each time this function is launched
        switch( input ){
            case '' :
                
                break;
        }
        
        $(document).ready(function(){
            // available arguments are: pays, region, departement, arrondissement
            dbGetter.getData('france', "pays", "region", 'Travailleurs', 2000 );
        });
        
        mapColor.apply( dbGetter.result, start, middle, end );
    };
</script>

<div class="row">
    <div class="col-sm-9">
        
        <!-- Affichage de la légende -->
        <svg width="100%" height="100%" viewBox="0 0 50 1">
            <rect id="Legend" style="fill:#214478" width="100%" height="100%" />
        </svg>
        
        <!-- Affichage de la carte -->
        <?php
            switch( $detail ){
                case "regions":
                    include("maps/france_regions.php");
                    break;
                case "departements":
                    include("maps/france_departements.php");
                    break;
                case "arrondissements":
                    include("maps/france_arrondissements.php");
                    break;
            }
            include("maps/france_departements.php");
            initMap($map_id);
        ?>
        
    </div>
    <div class="col-sm-3">
        <form role="form" id="options">
            <?php foreach( $sideMenu as $category => &$elements ){ ?>
            <strong><?= $category ?></strong>
                <?php foreach( $elements as $element => &$colors ){ ?>
            <div class="radio radio-<?= $colors[0] ?>">
                <input id="<?= $element ?>" name="critere" type="radio" onclick="ponderate(this, '<?= $colors[1] ?>', '<?= $colors[2] ?>', '<?= $colors[3] ?>' )" />
                <label for="<?= $element ?>" ><?= $element ?></label>
            </div>
                <?php } ?>
            <?php } ?>
            <input type="range" min="1990" value="2005" max="2015" />
        </form>
    </div>
</div>