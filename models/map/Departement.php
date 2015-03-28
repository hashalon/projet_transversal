<?php

require_once($RootDir.'models/abstract/MapElementSvg.php');
require_once($RootDir.'models/map/Arrondissement.php');

class Departement extends MapElementSvg{
    
    // id, name, parent, svg, children

    protected function hydrate( array &$data ){
        $this->hmatch( $data, 'setId', 'dep_no' );
        $this->hmatch( $data, 'setName', 'dep_name' );
        $this->hmatch( $data, 'setParent', 'reg_no' );
        $this->hmatch( $data, 'setSvg', 'dep_svg' );
        $this->hmatch( $data, 'setChildren', '_children' );
    }
    
}
