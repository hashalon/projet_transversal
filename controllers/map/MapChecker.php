<?php

// contains function to test the validity of POSTED parameters

require_once ($RootDir.'database/database.php');

$_mapChecker = new MapChecker();

class MapChecker {
    
    private $_map;
    private $_level;
    private $_detail;
    
    public function __construct(){
        $map = "France";
        if( isset($_GET['map']) ){
            if( !empty($_GET['map']) ){
                $map = (string) $_GET['map'];
            }
        }
        $this->_map = $map;
        $this->_level = $this->levelValue( $map );
        
        $detail = "regions";
        if( isset($_GET['detail']) ){
            if( !empty($_GET['detail']) ){
                $detail = (string) $_GET['detail'];
            }
        }
        $this->_detail = $this->detailValue( $detail );
        
        while( $this->_level < $this->_detail ){
            --$this->_detail;
        }
    }
    
    public function postMode(){
        $map = "France";
        if( isset($_POST['map']) ){
            if( !empty($_POST['map']) ){
                $map = (string) $_POST['map'];
            }
        }
        $this->_map = $map;
        $this->_level = $this->levelValue( $map );

        $detail = "regions";
        if( isset($_POST['detail']) ){
            if( !empty($_POST['detail']) ){
                $detail = (string) $_POST['detail'];
            }
        }
        $this->_detail = $this->detailValue( $detail );

        while( $this->_level < $this->_detail ){
            --$this->_detail;
        }
    }
    
    public function getMap(){
        return $this->_map;
    }
    public function getLevel(){
        return $this->_level;
    }
    public function getDetail(){
        return $this->_detail;
    }
    
    public function getLevelOf( $map ){
        return $this->levelValue( $map );
    }
    
    public function canDisplayRegions(){
        if( $this->_level >= 4 ){
            return true;
        }
        return false;
    }
    public function canDisplayDepartements(){
        if( $this->_level >= 3 ){
            return true;
        }
        return false;
    }
    public function canDisplayArrondissements(){
        if( $this->_level >= 2 ){
            return true;
        }
        return false;
    }
    public function canDisplayCommunes(){
        if( $this->_level >= 1 ){
            return true;
        }
        return false;
    }
    public function canDisplayOneCommune(){
        if( $this->_level >= 0 ){
            return true;
        }
        return false;
    }
    
    public function canDisplaySVG(){
        if( $this->_level >= $this->_detail && $this->_detail >= 2 ){
            return true;
        }
        return false;
    }
    
    public function canDisplayMap(){
        if( $this->_level >= 1 ){
            return true;
        }
        return false;
    }
    
    public function getLowerDetail(){
        $detail = "#";
        switch($this->_detail){
            case 4 :
                $detail = "departements";
                break;
            case 3 :
                $detail = "arrondissements";
                break;
            case 2 :
                $detail = "communes";
                break;
            case 1 :
                $detail = "com";
                break;
            case 0 :
                $detail = "com";
                break;
        }
        return $detail;
    }
    public function getCurrentDetail(){
        $detail = "#";
        switch($this->_detail){
            case 4 :
                $detail = "regions";
                break;
            case 3 :
                $detail = "departements";
                break;
            case 2 :
                $detail = "arrondissements";
                break;
            case 1 :
                $detail = "communes";
                break;
            case 0 :
                $detail = "com";
                break;
        }
        return $detail;
    }
    public function getHigherDetail(){
        $detail = "#";
        switch($this->_detail){
            case 4 :
                $detail = "regions";
                break;
            case 3 :
                $detail = "regions";
                break;
            case 2 :
                $detail = "departements";
                break;
            case 1 :
                $detail = "arrondissements";
                break;
            case 0 :
                $detail = "communes";
                break;
        }
        return $detail;
    }
    
    /* Check validity of GET parameters */
    public function isValid(){
        if( $this->_level != -1 && $this->_detail != -1 ){
            if( $this->_level >= $this->_detail ){
                return true;
            }
        }
        return false;
    }
    public function isInvalid(){
        return !$this->isValid();
    }
    
    /* Check if the map id match the detail level */
    private function levelValue( $map ){
        global $_DATABASE;
        $reg = $_DATABASE->query('SELECT * FROM `region` WHERE `reg_svg` = "'.$map.'";');
        $dep = $_DATABASE->query('SELECT * FROM `departement` WHERE `dep_svg` = "'.$map.'";');
        $arr = $_DATABASE->query('SELECT * FROM `arrondissement` WHERE `arr_svg` = "'.$map.'";');
        $com = $_DATABASE->query('SELECT * FROM `commune` WHERE `com_code` = "'.$map.'";');
        
        // 3 means we want to see all the regions of france
        $level = -1;
        if( $map == "France" ){
            $level = 4;
        }elseif( $reg->fetch() ){
            $level = 3;
        }elseif( $dep->fetch() ){
            $level = 2;
        }elseif( $arr->fetch() ){
            $level = 1;
        }elseif( $com->fetch() ){
            $level = 0;
        }
        return $level;
        
    }
    private function detailValue($detail){
        $value = -1;
        switch( $detail ){
            case 'regions':
                $value = 4;
                break;
            case 'departements':
                $value = 3;
                break;
            case 'arrondissements':
                $value = 2;
                break;
            case 'communes':
                $value = 1;
                break;
            case 'com':
                $value = 0;
                break;
        }
        return $value;
    }
    
}