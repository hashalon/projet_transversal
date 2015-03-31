<?php 

// on ajoute ici la bar de navigation
require_once($RootDir.'controllers/Controller.php');

?>
<ol class="breadcrumb">
    <li><a href="<?= $RootURL ?>">France</a></li>
<?php 
if( $_mapChecker->getLevel() == 3 ){
    $reg = $_controller->getRegionManager()->getBySvg( $_mapChecker->getMap() );
?>
    <li class="active"><?= $reg->getName() ?></li>
<?php  
}elseif( $_mapChecker->getLevel() == 2 ){
    $dep = $_controller->getDepartementManager()->getBySvg( $_mapChecker->getMap() );
    $reg = $_controller->getRegionManager()->getByDepartement( $dep );
?>
    <li><a href="<?= $RootURL.'?r=map&map='.urlencode($reg->getSvg()).'&detail=departements' ?>"><?= $reg->getName() ?></a></li>
    <li class="active"><?= $dep->getName() ?></li>
<?php
}elseif( $_mapChecker->getLevel() == 1 ){
    $arr = $_controller->getArrondissementManager()->getBySvg( $_mapChecker->getMap() );
    $dep = $_controller->getDepartementManager()->getByArrondissement( $arr );
    $reg = $_controller->getRegionManager()->getByDepartement( $dep );
?>
    <li><a href="<?= $RootURL.'?r=map&map='.urlencode($reg->getSvg()).'&detail=departements' ?>"><?= $reg->getName() ?></a></li>
    <li><a href="<?= $RootURL.'?r=map&map='.urlencode($dep->getSvg()).'&detail=arrondissements' ?>"><?= $dep->getName() ?></a></li>
    <li class="active"><?= $arr->getName() ?></li>
<?php
}elseif( $_mapChecker->getLevel() == 0 ){
    $com = $_controller->getCommuneManager()->getById( $_mapChecker->getMap() ); // commune are identified by there id
    $arr = $_controller->getArrondissementManager()->getByCommune( $com );
    $dep = $_controller->getDepartementManager()->getByArrondissement( $arr );
    $reg = $_controller->getRegionManager()->getByDepartement( $dep );
?>
    <li><a href="<?= $RootURL.'?r=map&map='.urlencode($reg->getSvg()).'&detail=departements' ?>"><?= $reg->getName() ?></a></li>
    <li><a href="<?= $RootURL.'?r=map&map='.urlencode($dep->getSvg()).'&detail=arrondissements' ?>"><?= $dep->getName() ?></a></li>
    <li><a href="<?= $RootURL.'?r=map&map='.urlencode($arr->getSvg()).'&detail=communes' ?>"><?= $arr->getName() ?></a></li>
    <li class="active"><?= $com->getName() ?></li>
<?php
}
?>
</ol>

<?php

if( $_mapChecker->canDisplaySVG() ){
    
    include_once( $RootDir.'views/map/map_svg.php' );
    
}elseif( $_mapChecker->canDisplayCommunes() ){
    
    include_once( $RootDir.'views/map/map_communes.php' );
    
}elseif( $_mapChecker->canDisplayOneCommune() ){
    
    //header( 'Location: '.$RootURL.'?r=graph&map='.$_mapChecker->getMap() );    
    
}

?>