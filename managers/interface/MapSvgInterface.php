<?php

require_once ($RootDir.'managers/interface/MapInterface.php');

interface MapSvgInterface extends MapInterface{
    
    public function getBySvg( string $svg );
    public function getChildren( $id );
    
}