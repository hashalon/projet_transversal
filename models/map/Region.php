<?php

require_once($RootDir.'models/abstract/MapElementSvg.php');

class Region extends MapElementSvg {
    
    // id, name, parent, svg, children
    
    protected function hydrate( array &$data ){
        $this->hmatch( $data, 'setId', 'reg_no' );
        $this->hmatch( $data, 'setName', 'reg_name' );
        $this->setParent("France");
        $this->hmatch( $data, 'setSvg', 'reg_svg' );
        $this->hmatch( $data, 'setChildren', '_children' );
    }
    
}
