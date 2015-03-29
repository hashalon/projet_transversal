<?php

// script de retranchement des données
// pour estimer le nombre de travailleurs par commune

require_once($RootDir.'database/database.php');

require_once($RootDir.'models/map/Commune.php');
require_once($RootDir.'models/map/ZoneEmploi.php');
require_once($RootDir.'managers/map/ZoneEmploiManager.php');


function getTravailleursOfCommune( Commune &$com, $year = null ){
    
    // we create a zoneEmploi manager
    $zoneMan = new ZoneEmploiManager($_DATABASE);
    
    // we recover the zoneEmploi of our commune object
    $zone = $zoneMan->getByCommune($com);
    
    // we check how many communes does our zone contains
    $nbCom = $zoneMan->getNumberOfCommunes($zone);
    
    // we recover the number of travailleurs for the given year
    $nbTrav = $zone->countTravailleurs($year);
    
    // we return a estimated number of travailleurs for the commune
    return (int)($nbTrav / $nbCom);
}

function getTauxChomageOfCommune( Commune &$com, $year = null ){
    
    // we create a zoneEmploi manager
    $zoneMan = new ZoneEmploiManager($_DATABASE);

    // we recover the zoneEmploi of our commune object
    $zone = $zoneMan->getByCommune($com);

    // we recover the number of travailleurs for the given year
    $tauxChom = $zone->avgChomage($year);

    // we return a estimated number of travailleurs for the commune
    return $tauxChom;
}