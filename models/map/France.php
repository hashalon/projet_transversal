<?php

require_once($RootDir.'models/abstract/MapElementSvg.php');
require_once($RootDir.'models/map/Region.php');

class France extends MapElementSvg{
    
    // id, name, parent, svg, children
    
    // for france we give directly the array of regions
    protected function hydrate( array &$data ){
        $this->setId("France");
        $this->setName("France");
        $this->setParent("France");
        $this->setSvg( "France" );
        $this->setChildren( $data );
    }
    
}