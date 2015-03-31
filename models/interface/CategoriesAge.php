<?php

require_once($RootDir.'database/database.php');

interface CategoriesAge{
    
    public function getCategoriesAge();
    public function setCategoriesAge($cats);
    public function isCategoryAge($cat);
    
}