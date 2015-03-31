<?php

require_once($RootDir.'models/abstract/MapElementSvg.php');
require_once($RootDir.'models/map/Commune.php');
require_once($RootDir.'controllers/Controller.php');

class Arrondissement extends MapElementSvg{

    // id, name, parent, svg

    public function __construct( array $data ){
        $this->hmatch( $data, 'setId', 'arr_code' );
        $this->hmatch( $data, 'setName', 'arr_name' );
        $this->hmatch( $data, 'setParent', 'dep_no' );
        $this->hmatch( $data, 'setSvg', 'arr_svg' );
    }
    
    public function getChildren(){
        global $_controller;
        return $_controller->getCommuneManager()->getListByParentId( $this->_id );
    }
    
}
