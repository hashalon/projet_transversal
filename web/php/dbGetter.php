<?php
// script de connection à la base de données
// Côté serveur

if(
    isset($_POST['map']) &&
    isset($_POST['detail']) &&
    isset($_POST['criteria'])
){
    if(
        !empty($_POST['map']) &&
        !empty($_POST['detail']) &&
        !empty($_POST['criteria'])
    ){
        if(
            is_string($_POST['map']) &&
            is_string($_POST['detail']) &&
            is_string($_POST['criteria'])
        ){
            // we make sure that level of map is higher than detail and that both are valid
            if( checkLevelDetail( $_POST['map'], $_POST['detail'] ) ){
                
                // we check if year is setted or not
                if( isset($_POST['year']) ){
                    if( !empty($_POST['year']) ){
                        $year = (int) $_POST['year'];
                        getData( $_POST['map'], $_POST['detail'], $_POST['criteria'], $_POST['year'] );
                    }else{
                        getData( $_POST['map'], $_POST['detail'], $_POST['criteria'] );
                    }
                }else{
                    getData( $_POST['map'], $_POST['detail'], $_POST['criteria'] );
                }
                
            }
        }
    }
}else{ // TODO TO REMOVE
    getData( $_GET['map'], $_GET['detail'], $_GET['criteria'] );
}

function getData( $map, $detail, $criteria, $year = null ){
    
    $conn = connect();
    $col_name  = ""; // the name of the column we want to retrieve
    $col_crit  = ""; // the name of the columns corresponding to our criteria
    $table     = ""; // the name of the tables we have to retrieve data from
    $col_match = ""; // parameters to make tables match
    $col_map   = ""; // parameter to limit the number of data to the currently selected map
    $keys = []; // names of the columns of values
    
    // we select the right column name
    switch( $detail ){
        case 'regions':
            $col_name = "reg_name";
            break;
        case 'departements':
            $col_name = "dep_name";
            break;
        case 'arrondissements':
            $col_name = "arr_name";
            break;
        case 'communes':
            $col_name = "com_name";
            break;
    }
    
    // we select the right table
    $level = selectTable( $map );
    switch( $level ){
        case 3:
            // since we are looking to the whole map, we are not restrickting data
            $table = "region, departement, arrondissement, commune";
            $col_match = "reg_no = region_reg_no and dep_no = departement_dep_no and arr_code = arrondissement_arr_code";
            break;
        case 2:
            $col_map = 'and reg_name = "'.$map.'"';
            $table = "region, departement, arrondissement, commune";
            $col_match = "dep_no = departement_dep_no and arr_code = arrondissement_arr_code";
            break;
        case 1:
            $col_map = 'and dep_name = "'.$map.'"';
            $table = "departement, arrondissement, commune";
            $col_match = "arr_code = arrondissement_arr_code";
            break;
        case 0:
            $col_map = 'and arr_name = "'.$map.'"';
            $table = "arrondissement, commune";
            break;
    }
    
    // we find the columns' name corresponding to our criteria
    switch( $criteria ){
        case 'Travailleurs' :
            $col_crit = "emploi";
            $table .= ", zone_demploi";
            $col_match .= " and zone_demploi_zone_no = zone_no";
            $key[0] = 'emploi';
            break;
        case 'Chômeurs' :
            $col_crit = "emploi, taux_chomage";
            $table .= ", zone_demploi";
            $col_match .= " and zone_demploi_zone_no = zone_no";
            $key[0] = 'emploi';
            $key[1] = 'taux_chomage';
            break;
        case 'Rapport Travailleurs/Chômeurs' :
            $col_crit = "taux_chomage";
            $table .= ", zone_demploi";
            $col_match .= " and zone_demploi_zone_no = zone_no";
            $key[0] = 'taux_chomage';
            break;
    }
    
    // we create the query
    $query =
         " SELECT ".$col_name.", ".$col_crit
        ." FROM ".$table
        ." WHERE ".$col_match." ".$col_map;
    if( isset($year) ){
        $query .= ' and date = '.$year;
    }
    $query .= " group by ".$col_name.";";
    
    // we execute the query
    $q = $conn->query($query);
    
    $data = [];
    while( $row = $q->fetch(PDO::FETCH_ASSOC) ){
        $value = 0;
        if( sizeof($row) <= 2 ){
            $value = floatval($row[$key[0]]);
        }else{ // if we have two values in our array, we must merge them into one
            
            $value = floatval($row[$key[0]]) * floatval($row[$key[1]]) / 100;
        }
        $data[stripAccents($row[$col_name])] = $value;
    }
    // $data must be an array with name of the map element as the key and number as the value
    echo json_encode($data);
}

function connect(){
    $conn = new PDO( 'mysql:host=localhost; dbname=dynamismeFR; charset=utf8', 'root', '');
    return $conn;
}

function selectTable( $map ){
    $conn = connect();
    $reg = $conn->query('select reg_name from region where reg_name = "'.$map.'"');
    $dep = $conn->query('select dep_name from departement where dep_name = "'.$map.'"');
    $arr = $conn->query('select arr_name from arrondissement where arr_name = "'.$map.'"');
    
    // 3 means we want to see all the regions of france
    $level = 3;
    if( $reg->fetch(PDO::FETCH_ASSOC) ){
        $level = 2;
    }elseif( $dep->fetch(PDO::FETCH_ASSOC) ){
        $level = 1;
    }elseif( $arr->fetch(PDO::FETCH_ASSOC) ){
        $level = 0;
    }
    return $level;
}

function checkLevelDetail( $map, $detail ){
    // we search for the table where the map is stored
    $level = selectTable( $map );
    $detail_level = detailValue($detail);
    if( 
        $level != -1 &&
        $detail_level != -1
    ){
        if( $level >= $detail_level ){
            return true;
        }
    }
    return false;
}

function detailValue($detail){
    $value = -1;
    switch( $detail ){
        case 'regions':
            $value = 3;
            break;
        case 'departements':
            $value = 2;
            break;
        case 'arrondissements':
            $value = 1;
            break;
        case 'communes':
            $value = 0;
            break;
    }
    return $value;
}

function stripAccents($str) {
    return strtr(utf8_decode($str), utf8_decode("àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ '()"), "aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY____");
}
