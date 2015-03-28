<?php

// contains function to test the validity of POSTED parameters

require_once ($RootDir.'database/database.php');

$_mapChecker = new MapChecker();

class MapChecker {
    
    public function __contruct(){
    }
    
    public function isValid(){
        if( isset($_GET['map']) && isset($_GET['detail']) ){
            if( !empty($_GET['map']) && !empty($_GET['detail']) ){
                if( is_string($_GET['map']) && is_string($_GET['detail']) ){
                    // we make sure that level of map is higher than detail and that both are valid
                    if( $this->checkLevelDetail( $_GET['map'], $_GET['detail'] ) ){
                        return true;
                    }
                }
            }
        }
        return false;
    }
    public function isInvalid(){
        return !$this->isValid();
    }
    
    public function isValidPOST(){
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
    public function isInvalidPOST(){
        return !$this->isValidPOST();
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
        global $_DATABASE;
        $reg = $_DATABASE->query('select * from `region` where `reg_svg` = '.$map);
        $dep = $_DATABASE->query('select * from `departement` where `dep_svg` = '.$map);
        $arr = $_DATABASE->query('select * from `arrondissement` where `arr_svg` = '.$map);
        
        // 3 means we want to see all the regions of france
        $level = -1;
        if( $map == "france" ){
            $level = 3;
        }elseif( $reg != null ){
            $level = 2;
        }elseif( $dep != null ){
            $level = 1;
        }elseif( $arr != null ){
            $level = 0;
        }
        return $level;
        
    }
    private function detailValue($detail){
        $value = -1;
        switch( $detail ){
            case 'regions':
                $value = 3;
                break;
            case 'departements':
                $value = 2;
                break;
            case 'arrondissements':
                $value = 1;
                break;
            case 'communes':
                $value = 0;
                break;
        }
        return $value;
    }
    
}