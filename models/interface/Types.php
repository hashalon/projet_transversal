<?php

require_once($RootDir.'database/database.php');

interface Types{
    
    public function getTypes();
    public function setTypes($types);
    public function isType($type);
    
}