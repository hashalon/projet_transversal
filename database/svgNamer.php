<?php

// script pour remplir les colonnes svg automatiquement
$RootDir = '../';

require_once($RootDir.'controllers/Controller.php');

$regs = $_controller->getRegionManager()->getList();
$deps = $_controller->getDepartementManager()->getList();
$arrs = $_controller->getArrondissementManager()->getList();

foreach( $regs as &$reg ){
    $reg->setSvg( stripChars($reg->getName()) );
    $_controller->getRegionManager()->update( $reg );
}

foreach( $deps as &$dep ){
    $dep->setSvg( stripChars($dep->getName()) );
    $_controller->getDepartementManager()->update( $dep );
}

foreach( $arrs as &$arr ){
    $arr->setSvg( stripChars($arr->getName()) );
    $_controller->getArrondissementManager()->update( $arr );
}

function stripChars($str) {
    return strtr(
        utf8_decode($str),
        utf8_decode("àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ '()"),
        "aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY____"
    );
}