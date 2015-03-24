<?php
use yii\helpers\Html;

    $sideMenu = [
        'Population active' => [
            'Travailleurs' => [ 'blue', '#59c6e6', '#112aea', '#030b1f' ],
            'Chômeurs' => [ 'red', '#edc2be', '#e61f18', '#4e0f0f' ],
            'Rapport Travailleurs/Chômeurs' => [ 'magenta', '#1b1bd9', '#be4bb9', '#be1919' ],
        ],
        'Population' => [
            'Natalité' => [ 'yellow', '#e5e5c7', '#e6e618', '#332207' ],
            'Mortalité' => [ 'grey', '#dedede', '#585858', '#292929' ],
            'Rapport Natalité/Mortalité' => [ 'brown', '#2a2a2a', '#ffffff', '#e0e018' ],
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
    
?>
<script>
    window.onload = function () {
        // TODO rename the id of the g group of each svg file to "Map"
        mapColor.init("<?= "#".$map ?>");
    };
    
    function ponderate(input, year, start, middle, end){
        // we get data for the right map, with the right detail mode
        $(document).ready(function(){
            var criteria = input.id;
            dbGetter.colors = [ start, middle, end ];
            dbGetter.getData( "<?= $map ?>", "<?= $detail ?>", criteria, year );
        });
    };
</script>

<div class="row">
    <div class="col-sm-9">
        
        <!-- Affichage de la légende -->
        <svg width="100%" height="100%" viewBox="0 0 200 10">
            <rect id="Legend_gradient" style="fill:#214478" width="200" height="5" />
            <text id="Legend_minValue" font-size="5" style="fill:#fff" x="0" y="10">???</text>
            <text id="Legend_maxValue" font-size="5" style="fill:#fff" x="200" y="10" text-anchor="end">???</text>
            <text id="Legend_label" font-size="5" style="fill:#fff" x="100" y="10" text-anchor="middle">???</text>
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
            initMap($map);
        ?>
        
    </div>
    <div class="col-sm-3">
        <form role="form" id="options">
            
            <?php 
                $count = 0;
                foreach( $sideMenu as $category => &$elements ){
            ?>
            <strong><?= $category ?></strong>
                <?php foreach( $elements as $element => &$colors ){ ?>
            <div class="radio radio-<?= $colors[0] ?>">
                <input id="<?= $element ?>" name="critere" value="<?= $count++ ?>" type="radio" onchange="ponderate(this, null,'<?= $colors[1] ?>', '<?= $colors[2] ?>', '<?= $colors[3] ?>' )" />
                <label for="<?= $element ?>" ><?= $element ?></label>
            </div>
                <?php } ?>
            <?php } ?>
            <div id="year_selector" class="btn-group" role="group" aria-label="year">
                <button type="button" id="test" class="btn btn-default" onclick="ponderate(this, null,'#59c6e6', '#112aea', '#030b1f' )">Travail</button>
            </div>
            
        </form>
    </div>
</div>