<?php
// script de connection à la base de données
// Côté serveur

if(
    isset($_POST['map']) &&
    isset($_POST['level']) &&
    isset($_POST['detail']) &&
    isset($_POST['criteria'])
){
    if(
        !empty($_POST['map']) &&
        !empty($_POST['level']) &&
        !empty($_POST['detail']) &&
        !empty($_POST['criteria'])
    ){
        if(
            is_string($_POST['map']) &&
            is_string($_POST['level']) &&
            is_string($_POST['detail']) &&
            is_string($_POST['criteria'])
        ){
            // we make sure that level is higher than detail and that both are valid
            if( checkLevelDetail( $_POST['level'], $_POST['detail'] ) ){
                
                // we check if year is setted or not
                if( isset($_POST['year']) ){
                    if( !empty($_POST['year']) ){
                        $year = (int) $_POST['year'];
                        getData( $_POST['map'], $_POST['level'], $_POST['detail'], $_POST['criteria'], $_POST['year'] );
                    }
                }else{
                    getData( $_POST['map'], $_POST['level'], $_POST['detail'], $_POST['criteria'] );
                }
                
            }
        }
    }
}

// TODO complete the function once we have the database filled
function getData( $map, $level, $detail, $criteria, $year = null ){
    $conn = connect();
    $query = "";
    
    // we find the query corresponding to our criteria
    switch( $criteria ){
        case 'nom_du_critère' :
            $query = 'select truc from machin';
            break;
    }
    
    // we add the conditions
    $query .= ' where '; // $text .= 'truc' <=> $text = $text.'truc'
    // TODO create the query to recover the required data
    $query .= ' map = '.$map;
    
    if( isset($year) ){
        $query .= ' date = '.$year;
    }
    
    // we execute the query
    $q = $conn->query($query);
    
    $data = [];
    while ($row = $q->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    
    // $data must be an array with name of the map element as the key and number as the value
    return json_encode($data);
}

function connect(){
    $db = getDB();
    $conn = new PDO( $db['dsn'].';charset='.$db['charset'], $db['username'], $db['password']);
    return $conn;
}
function getDB(){
    require("../../config/db.php");
}

function checkLevelDetail( $level, $detail ){
    if(
        detailValue($level) != -1 &&
        detailValue($detail) != -1
    ){
        if( detailValue($level) > detailValue($detail) ){
            return true;
        }
    }
    return false;
}
function detailValue($detail){
    $value = -1
    switch( $detail ){
        case 'pays' :
            $value = 4;
            break;
        case 'region' :
            $value = 3;
            break;
        case 'departement' :
            $value = 2;
            break;
        case 'arrondissement' :
            $value = 1;
            break;
    }
    return $value;
}
