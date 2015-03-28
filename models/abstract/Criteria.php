<?php

require_once ($RootDir.'models/abstract/Base.php');

abstract class Criteria extends Base{

    // id
    protected $_year;
    protected $_num;

    public function getYear(){
        return $this->_year;
    }
    public function setYear($year){
        $year = (int) $year;
        $this->_year = $year;
    }

    public function getStrYear(){
        return date("Y", $this->_year);
    }
    public function setStrYear($year){
        $year = (string) $year;
        $this->_year = mktime( 0,0,0,0,0, $year );
    }
    
    public function getNum(){
        return $this->_num;
    }
    public function setNum($num){
        $num = (int) $num;
        $this->_num = $num;
    }

}