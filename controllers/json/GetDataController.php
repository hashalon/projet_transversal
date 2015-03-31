<?php // echo and html content is prohibited in this class because must only return json data

// http://localhost:8080/projet_transversal/controllers/json/GetDataController.php?map=France&detail=regions&criteria=pop

// we set the $RootDir variable back to the root directory
$RootDir = '../../';

// we include the main controller
require_once ($RootDir.'controllers/Controller.php');
require_once ($RootDir.'controllers/map/MapChecker.php');
require_once ($RootDir.'controllers/criteria/ActivePopulation.php');

$_mapChecker->postMode(); // we change the mode of mapChecker to check data sent by POST and not GET

if( $_mapChecker->isValid() ){
    
    if( isset($_POST['criteria']) ){
        if( !empty($_POST['criteria']) ){
            if( isset($_POST['year']) ){
                getData( $_POST['map'], $_POST['detail'], $_POST['criteria'], $_POST['year'] );
            }else{
                getData( $_POST['map'], $_POST['detail'], $_POST['criteria'] );
            }
        }
    }
    
}

else{ // TODO TO REMOVE
    if( isset($_GET['year']) ){
        getData( $_GET['map'], $_GET['detail'], $_GET['criteria'], $_GET['year'] );
    }else{
        getData( $_GET['map'], $_GET['detail'], $_GET['criteria'] );
    }
}

// dataChecker will launch the function if values are valid
function getData( $map, $detail, $criteria, $year = null ){
    $data = [];
    
    
    switch( $criteria ){
        // Population active
        case 'pop_active' :
            
            break;
        case 'trav' :
            
            break;
        case 'chom' :
            
            break;
        case 'taux_chom' :
            
            break;
        // Population
        case 'pop' :
            
            break;
        case 'naiss' :
            
            break;
        case 'deces' :
            
            break;
        case 'var_demo' :
            
            break;
        // Logements
        case 'loge' :
            
            break;
        case 'mena' :
            
            break;
        // Entreprises
        case 'etabl' :
            
            break;
    }
    echo json_encode($data);
}

function PopulationActive(){
    
}

function Travailleurs(){
    
}

function Chomeurs(){
    
}

function TauxChomage(){
    
}

function Population(){
    
}

function Naissances(){
    
}

function Deces(){
    
}

function VariationDemographique(){
    
}

function Logements(){
    
}

function Menages(){
    
}

function Etablissements(){
    
}
