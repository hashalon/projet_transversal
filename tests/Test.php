<?php

$RootDir = "../";
require_once($RootDir.'models/Region.php');
require_once($RootDir.'models/Departement.php');
require_once($RootDir.'models/Arrondissement.php');
require_once($RootDir.'models/Commune.php');

/*

phpunit --bootstrap Test.php models/Region.php
phpunit --bootstrap Test.php models/Departement.php
phpunit --bootstrap Test.php models/Arrondissement.php
phpunit --bootstrap Test.php models/Commune.php

*/