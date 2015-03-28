<?php

abstract class Base {

    protected $_id;

    public function __contruct( array &$data ){
        $this->hydrate($data);
    }

    protected abstract function hydrate( array &$data );

    protected function hmatch( array &$data, $method, $attributes ){
        if( isset($data[$attribute]) ){
            if( method_exists($this, $method) ){
                $this->$method($data[$attribute]);
            }else{
                throw new Exception("Method does not exist in class");
            }
        }else{
            throw new Exception("Attribute not present in data array");
        }
    }

    public function getId(){
        return $this->_id;
    }
    public function setId($id){
        $id = (string) $id;
        $this->_id = $id;
    }

}