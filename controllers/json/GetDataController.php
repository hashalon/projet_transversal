<?php // echo and html content is prohibited in this class because must only return json data

// we set the $RootDir variable back to the root directory
$RootDir = '../../';

// we include the main controller
require_once ($RootDir.'controllers/Controller.php');
require_once ($RootDir.'controllers/json/DataChecker.php');

$dataChecker = new DataChecker(); // check POSTED parameters

if( $dataChecker->isValid() ){
    if( isset($_POST['criteria']) ){
        if( !empty($_POST['criteria']) ){
            getData( $_POST['map'], $_POST['detail'], $_POST['criteria'], $_POST['year'] );
        }
    }
}

else{ // TODO TO REMOVE
    getData( $_GET['map'], $_GET['detail'], $_GET['criteria'], $_GET['year'] );
}

// dataChecker will launch the function if values are valid
function getData( $map, $detail, $criteria, $year = null ){
    $data = [];
    
    
    switch( $criteria ){
        // Population active
        case 'pop active' :
            
            break;
        case 'trav' :
            
            break;
        case 'chom' :
            
            break;
        case 'taux chom' :
            
            break;
        // Population
        case 'pop' :
            
            break;
        case 'naiss' :
            
            break;
        case 'deces' :
            
            break;
        case 'var demo' :
            
            break;
        // Logements
        case 'loge' :
            
            break;
        case 'mena' :
            
            break;
        // Fiscalité
        case 'mena fisc' :
            
            break;
        case 'pers in mena fisc' :
            
            break;
        case 'pers per mena fisc' :
            
            break;
        // Entreprises
        case 'etabl' :
            
            break;
        // Education
        case 'dipl' :
            
            break;
    }
    echo json_encode($data);
}

function PopActive(){
    
}

