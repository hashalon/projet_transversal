<?php

// We use this class as a namespace to contains all of the functions necessary for the whole website

// session_start();
require_once($RootDir.'database/database.php');
// on importe les managers
require_once($RootDir.'managers/map/RegionManager.php');
require_once($RootDir.'managers/map/DepartementManager.php');
require_once($RootDir.'managers/map/ArrondissementManager.php');
require_once($RootDir.'managers/map/CommuneManager.php');

$_controller = new Controller();

/* DECREPATED */
// too heavy for the server

class Controller {
    
    private $_db;
    
    private $_regMan;
    private $_depMan;
    private $_arrMan;
    private $_comMan;
    
    public function __construct(){
        // first we create a connection to the database
        global $_DATABASE;
        $this->_db = $_DATABASE;
        // then we create the managers
        $this->_regMan = new RegionManager($_DATABASE);
        $this->_depMan = new DepartementManager($_DATABASE);
        $this->_arrMan = new ArrondissementManager($_DATABASE);
        $this->_comMan = new CommuneManager($_DATABASE);
    }
    
    public function getDatabase(){
        return $this->_db;
    }
    
    /* Region Manager */
    public function getRegionManager(){
        return $this->_regMan;
    }
    public function getRegMan(){ // short version
        return $this->_regMan;
    }
    
    /* Departement Manager */
    public function getDepartementManager(){
        return $this->_depMan;
    }
    public function getDepMan(){ // short version
        return $this->_depMan;
    }
    
    /* Arrondissement Manager */
    public function getArrondissementManager(){
        return $this->_arrMan;
    }
    public function getArrMan(){ // short version
        return $this->_arrMan;
    }
    
    /* Commune Manager */
    public function getCommuneManager(){
        return $this->_comMan;
    }
    public function getComMan(){ // short version
        return $this->_comMan;
    }
}

