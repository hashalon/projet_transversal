<?php

require_once($RootDir.'models/abstract/MapElementSvg.php');
require_once($RootDir.'models/map/Departement.php');
require_once($RootDir.'controllers/Controller.php');

class Region extends MapElementSvg {
    
    // id, name, parent, svg
    
    public function __construct( array $data ){
        $this->hmatch( $data, 'setId', 'reg_no' );
        $this->hmatch( $data, 'setName', 'reg_name' );
        $this->setParent("France");
        $this->hmatch( $data, 'setSvg', 'reg_svg' );
    }
    
    public function getChildren(){
        global $_controller;
        return $_controller->getDepartementManager()->getListByParentId( $this->_id );
    }
    
}
