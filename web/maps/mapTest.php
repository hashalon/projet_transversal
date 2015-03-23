<?php 

$db = new PDO('mysql:host=localhost; dbname=DynamismeFR; charset=utf8', 'root', '');

function getListReg(){
    $db = new PDO('mysql:host=localhost; dbname=DynamismeFR; charset=utf8', 'root', '');
    $reg = [];
    $q = $db->query('SELECT reg_name FROM region');
    while ($data = $q->fetch(PDO::FETCH_ASSOC)){
        $reg[] = $data['reg_name'];
    }
    return $reg;
}

function getListDep(){
    $db = new PDO('mysql:host=localhost; dbname=DynamismeFR; charset=utf8', 'root', '');
    $dep = [];
    $q = $db->query('SELECT dep_name FROM departement');
    while ($data = $q->fetch(PDO::FETCH_ASSOC)){
        $dep[] = $data['dep_name'];
    }
    return $dep;
}

function getListArr(){
    $db = new PDO('mysql:host=localhost; dbname=DynamismeFR; charset=utf8', 'root', '');
    $arr = [];
    $q = $db->query('SELECT arr_name FROM arrondissement');
    while ($data = $q->fetch(PDO::FETCH_ASSOC)){
        $arr[] = $data['arr_name'];
    }
    return $arr;
}

function stripAccents($str) {
    return strtr(utf8_decode($str), utf8_decode("àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ '()"), "aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY____");
}

?>

<!DOCTYPE html>
<head></head>
<body>

<?php

include("france_arrondissements.php");
initMap();
$elements = getListArr();

?>
<script src="../js/snap.svg.min.js"></script>
<script>
    var data = [
        <?php
            foreach( $elements as $e ){
                $name = stripAccents($e);
                echo '"'.$name.'",';
            }
        ?>
    ""];
    
    var map = Snap.select( "#Map" );
    
    for( var i=0; i<data.length; ++i ){
        var e = map.select("#"+data[i]);
        if( e != null ){
            e.attr({ fill: "#008800" });
        }
    }
</script>
    
</body>