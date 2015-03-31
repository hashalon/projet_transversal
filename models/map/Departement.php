<?php

require_once($RootDir.'models/abstract/MapElementSvg.php');
require_once($RootDir.'models/map/Arrondissement.php');
require_once($RootDir.'controllers/Controller.php');

class Departement extends MapElementSvg{
    
    // id, name, parent, svg

    public function __construct( array $data ){
        $this->hmatch( $data, 'setId', 'dep_no' );
        $this->hmatch( $data, 'setName', 'dep_name' );
        $this->hmatch( $data, 'setParent', 'reg_no' );
        $this->hmatch( $data, 'setSvg', 'dep_svg' );
    }
    
    public function getChildren(){
        global $_controller;
        return $_controller->getArrondissementManager()->getListByParentId( $this->_id );
    }
    
}
