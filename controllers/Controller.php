<?php

// We use this class as a namespace to contains all of the functions necessary for the whole website

// session_start();
require_once($RootDir.'models/map/Region.php');
require_once($RootDir.'managers/map/RegionManager.php');
require_once($RootDir.'models/map/Departement.php');
require_once($RootDir.'managers/map/DepartementManager.php');
require_once($RootDir.'models/map/Arrondissement.php');
require_once($RootDir.'managers/map/ArrondissementManager.php');
require_once($RootDir.'models/map/Commune.php');
require_once($RootDir.'managers/map/CommuneManager.php');

$_controller = new Controller();

class Controller {
    
    private $_db;
    
    private $_regMan;
    private $_depMan;
    private $_arrMan;
    private $_comMan;
    
    public function __construct(){
        // first we create a connection to the database
        
        $this->_db = new PDO('mysql:host=localhost; dbname=dynamismeFR; charset=utf8', 'root', '');
        // then we create the managers
        $this->_regMan = new RegionManager($this->_db);
        $this->_depMan = new DepartementManager($this->_db);
        $this->_arrMan = new ArrondissementManager($this->_db);
        $this->_comMan = new CommuneManager($this->_db);
    }
    
    public function getDatabase(){
        return $this->_db;
    }
    public function getRegionManager(){
        return $this->_regMan;
    }
    public function getRegMan(){ // short version
        return $this->_regMan;
    }
    public function getDepartementManager(){
        return $this->_depMan;
    }
    public function getDepMan(){ // short version
        return $this->_depMan;
    }
    public function getArrondissementManager(){
        return $this->_demandMan;
    }
    public function getArrMan(){ // short version
        return $this->_arrMan;
    }
    public function getCommuneManager(){
        return $this->_comMan;
    }
    public function getComMan(){ // short version
        return $this->_comMan;
    }
}

