<?php

try {
    
    $_DATABASE = new PDO(
        'mysql:host=localhost; dbname=dynamismeFR; charset=utf8',
        'root',
        ''
    );
    
} catch (PDOException $e) {
    die('unable to connect to database ' . $e->getMessage());
}