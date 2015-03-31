<?php

require_once ($RootDir.'models/abstract/Base.php');

abstract class BaseManager {
    
    protected $_db;
    
    public function __construct(PDO &$db){
        $this->setDatabase($db);
    }

    public abstract function get( $id );

    public abstract function getList();

    public function getDatabase(){
        return $this->_db;
    }
    public function setDatabase(PDO $db){
        $this->_db = $db;
    }
    
}