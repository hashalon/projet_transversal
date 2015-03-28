<?php

interface MapInterface{
    
    public function add( $object );
    public function getByName( string $name );
    public function getListByParent( $object );
    public function getListByParentId( $id );
    public function update( $object );
    
}