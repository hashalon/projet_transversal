<?php

require_once ($RootDir.'managers/abstract/Base.php');
require_once ($RootDir.'models/criteria/Logements.php');
require_once ($RootDir.'models/map/Commune.php');

class LogementsManager extends Base{

    // get the logements object from the database based on its log_id
    public function get( $id ){
        $q = $this->_db->query('SELECT * FROM `logements` WHERE `log_id` = '.$id);
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new Logements($data);
        }
    }
    // get logements objects of this commune object
    public function getByCommune( Commune $com ){
        $logs = [];
        $q = $this->_db->query('SELECT * FROM `logements` WHERE `com_code`="'.$com->getId().'"');
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            $logs[] = new Logements($data);
        }
        return $logs;
    }
    // get logements objects of this commune name
    public function getByCommuneName( string $name ){
        $name = (string) $name;
        $logs = [];
        $q = $this->_db->query('SELECT * FROM `logements` NATURAL JOIN `commune` WHERE `com_name`="'.$name.'"');
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            $logs[] = new Logements($data);
        }
        return $logs;
    }

    // get list of all arrondissements
    public function getList(){
        $logs = [];
        $q = $this->_db->query('SELECT * FROM `logements` ORDER BY `log_year`');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $logs[] = new Logements($data);
        }
        return $logs;
    }
    // get list of all arrondissements in the given departement
    public function getListByType( $type ){
        $type = (string) $type;
        $logs = [];
        $q = $this->_db->query('SELECT * FROM `logements` NATURAL JOIN `log_type` WHERE `log_name`="'.$type.'" ORDER BY `log_year`');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $logs[] = new Logements($data);
        }
        return $logs;
    }

}