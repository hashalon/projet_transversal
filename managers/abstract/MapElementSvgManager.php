<?php

require_once ($RootDir.'managers/abstract/MapElementManager.php');
require_once ($RootDir.'models/abstract/MapElementSvg.php');

abstract class MapElementSvgManager extends MapElementManager{
    
    public abstract function getBySvg( string $svg );
    
}