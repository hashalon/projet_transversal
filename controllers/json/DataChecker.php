<?php

// contains function to test the validity of POSTED parameters

require_once ($RootDir.'controllers/Controller.php');
require_once ($RootDir.'controllers/json/GetDataController.php')

class DataChecker {

    private $_map;
    private $_mapLevel;
    private $_mapDetail;
    
    public __contruct(){
        $this->isValid();
    }
    
    public function isValid(){
        if( isset($_POST['map']) && isset($_POST['detail']) ){
            if( !empty($_POST['map']) && !empty($_POST['detail']) ){
                if( is_string($_POST['map']) && is_string($_POST['detail']) ){
                    // we make sure that level of map is higher than detail and that both are valid
                    if( $this->checkLevelDetail( $_POST['map'], $_POST['detail'] ) ){
                        return true;
                    }
                }
            }
        }
        return false;
    }

    public function getMap(){
        return $this->_map;
    }
    public function getMapLevel(){
        $this->_mapLevel;
    }
    public function getMapDetail(){
        $this->_mapDetail;
    }
    
    private function checkLevelDetail( $map, $d ){
        // we search for the table where the map is stored
        $level = $this->levelValue( $map );
        $detail = $this->detailValue($d);
        if( 
            $level != -1 &&
            $detail != -1
        ){
            if( $level >= $detail ){
                return true;
            }
        }
        return false;
    }
    private function levelValue( $map ){
        $conn = $_controller->getDatabase();
        $reg = $conn->query('select reg_name from region where reg_name = "'.$map.'"');
        $dep = $conn->query('select dep_name from departement where dep_name = "'.$map.'"');
        $arr = $conn->query('select arr_name from arrondissement where arr_name = "'.$map.'"');

        // 3 means we want to see all the regions of france
        if( $map == "france" ){
            $level = 3;
            $this->_mapLevel = "france";
        }elseif( $reg->fetch(PDO::FETCH_ASSOC) ){
            $level = 2;
            $this->_mapLevel = "region";
        }elseif( $dep->fetch(PDO::FETCH_ASSOC) ){
            $level = 1;
            $this->_mapLevel = "departement";
        }elseif( $arr->fetch(PDO::FETCH_ASSOC) ){
            $level = 0;
            $this->_mapLevel = "arrondissement";
        }
        return $level;
    }
    private function detailValue($detail){
        $value = -1;
        switch( $detail ){
            case 'regions':
                $value = 3;
                $this->_mapDetail = $detail;
                break;
            case 'departements':
                $value = 2;
                $this->_mapDetail = $detail;
                break;
            case 'arrondissements':
                $value = 1;
                $this->_mapDetail = $detail;
                break;
            case 'communes':
                $value = 0;
                $this->_mapDetail = $detail;
                break;
        }
        return $value;
    }
    
}