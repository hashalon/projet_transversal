<?php

abstract class Base {

    protected $_id;

    protected function hmatch( array &$data, $method, $attribute ){
        if( isset($data[$attribute]) ){
            if( method_exists($this, $method) ){
                $this->$method($data[$attribute]);
            }else{
                throw new Exception("Method does not exist in class");
            }
        }else{
            throw new Exception("Attribute not present in data array: ".$attribute);
        }
    }

    public function getId(){
        return $this->_id;
    }
    public function setId($id){
        $this->_id = $id;
    }

}