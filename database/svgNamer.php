<?php

// script pour remplir les colonnes svg automatiquement
$RootDir = '../';

require_once($RootDir.'database/database.php');

$q = $_DATABASE->query('select * from `region`');

while( $data = $q->fetch(PDO::FETCH_ASSOC) ){
    $svg = stripChars( $data['reg_name'] );
    $q2 = $_DATABASE->prepare('update `region` set `reg_svg` = :svg where `reg_no` = :no ');
    $q2->bindValue(':no', $data['reg_no']);
    $q2->bindValue(':svg', $svg);
    $q2->execute();
}

$q = $_DATABASE->query('select * from `departement`');

while( $data = $q->fetch(PDO::FETCH_ASSOC) ){
    $svg = stripChars( $data['dep_name'] );
    $q2 = $_DATABASE->prepare('update `departement` set `dep_svg` = :svg where `dep_no` = :no ');
    $q2->bindValue(':no', $data['dep_no']);
    $q2->bindValue(':svg', $svg);
    $q2->execute();
}

$q = $_DATABASE->query('select * from `arrondissement`');

while( $data = $q->fetch(PDO::FETCH_ASSOC) ){
    $svg = stripChars( $data['arr_name'] );
    $q2 = $_DATABASE->prepare('update `arrondissement` set `arr_svg` = :svg where `arr_code` = :code ');
    $q2->bindValue(':code', $data['arr_code']);
    $q2->bindValue(':svg', $svg);
    $q2->execute();
}

function stripChars($str) {
    return strtr(
        utf8_decode($str),
        utf8_decode("àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ '()"),
        "aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY____"
    );
}