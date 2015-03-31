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