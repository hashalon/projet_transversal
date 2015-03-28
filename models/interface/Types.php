<?php

interface Types{
    
    public function getTypes();
    public function setTypes(array $types);
    public function addType($type);
    public function isType($type);
    
}