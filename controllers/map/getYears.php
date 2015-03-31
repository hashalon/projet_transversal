<?php
require_once( $RootDir.'controllers/Controller.php' );

function getYearsIn( $criteria ){
    global $_controller;
    $comMan = $_controller->getCommuneManager();
    $years = [];
    switch( $criteria ){
        case 'pop_active' :
            $years = array_intersect( $comMan->getYearsInTravailleurs(), $comMan->getYearsInDefm() );
            break;
        case 'trav' :
            $years = $comMan->getYearsInTravailleurs();
            break;
        case 'chom' :
            $comMan->getYearsInDefm();
            break;
        case 'taux_chom' :
            $years = array_intersect( $comMan->getYearsInTravailleurs(), $comMan->getYearsInDefm() );
            break;
        // Population
        case 'pop' :
            $years = $comMan->getYearsInPopulation();
            break;
        case 'naiss' :
            $years = $comMan->getYearsInNaissances();
            break;
        case 'deces' :
            $years = $comMan->getYearsInDeces();
            break;
        case 'var_demo' :
            $years = array_intersect( $comMan->getYearsInNaissances(), $comMan->getYearsInDeces() );
            break;
        // Logements
        case 'loge' :
            $years = $comMan->getYearsInLogements();
            break;
        case 'mena' :
            $years = $comMan->getYearsInMenages();
            break;
        // Entreprises
        case 'etabl' :
            $years = $comMan->getYearsInEtablissements();
            break;
    }
    return $years;
}
?>

<div id="year_selector" >

<?php
foreach( $sideMenu as $category => &$elements ){
    foreach( $elements as $element => &$attr ){
        $years = getYearsIn($attr[0]);
?>
    <div id="<?= $attr[0] ?>" style="display:none" class="year-selector btn-group-vertical" role="group" aria-label="year">
        <?php foreach( $years as &$year ){ ?>
        <button type="button" class="btn btn-default" onclick="ponderate('<?= $attr[0] ?>', '<?= $year ?>','<?= $attr[2] ?>', '<?= $attr[3] ?>', '<?= $attr[4] ?>' )"><?= $year ?></button>
        <?php } ?>
    </div>
<?php
    }
}
?>

</div>