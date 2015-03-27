<?php

require_once ($RootDir.'managers/abstract/BaseManager.php');
require_once ($RootDir.'models/abstract/MapElement.php');

abstract class MapElementManager extends BaseManager{
    
    // find an element by it's name
    public abstract function getByName( string $name );
    
    // find elements by their parent
    public abstract function getListByParent( $object );
    
}