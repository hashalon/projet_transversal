<?php

require_once($RootDir.'models/abstract/MapElementSvg.php');
require_once($RootDir.'models/map/Commune.php');

class Arrondissement extends MapElementSvg{

    // id, name, parent, svg, children

    protected function hydrate( array &$data ){
        $this->hmatch( $data, 'setId', 'arr_code' );
        $this->hmatch( $data, 'setName', 'arr_name' );
        $this->hmatch( $data, 'setParent', 'dep_no' );
        $this->hmatch( $data, 'setSvg', 'arr_svg' );
        $this->hmatch( $data, 'setChildren', '_children' );
    }
    
}