<?php

require_once ($RootDir.'models/abstract/Base.php');

abstract class BaseManager {
    
    private $_db;
    
    public function __construct(PDO $db){
        $this->setDatabase($db);
    }
    
    public abstract function add( $object );

    public abstract function delete( $id );

    public abstract function get( $id );

    public abstract function getList();

    public abstract function update( $object );

    public function setDatabase(PDO $database){
        $this->_db = $database;
    }
    
}