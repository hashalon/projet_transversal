<?php

require_once ($RootDir.'managers/abstract/MapElementManager.php');
require_once ($RootDir.'models/map/Arrondissement.php');
require_once ($RootDir.'models/map/Commune.php');
require_once ($RootDir.'models/map/ZoneEmploi.php');

class CommuneManager extends MapElementManager{

    // add a commune entry to the database
    public function add( $com ){
        $q = $this->_db->prepare(
            'INSERT INTO `departement` SET '
            .'`com_code` = :code, '
            .'`com_name` = :name, '
            .'`epci` = :epci, '
            .'`arr_code` = :arr, '
            .'`zone_no` = :zone '
        );
        $q->bindValue(':code', $dep->getId());
        $q->bindValue(':name', $dep->getName());
        $q->bindValue(':epci', $dep->getEPCI());
        $q->bindValue(':arr', $dep->getParent());
        $q->bindValue(':zone', $dep->getZoneEmploi());
        $q->execute();
    }

    // not necessary
    public function delete( $id ){
    }

    // get the commune object from the database based on its com_code
    public function get( $id ){
        $q = $this->_db->query('SELECT * FROM `commune` WHERE `com_code` = '.$id);
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new Commune($data);
        }
    }
    // get the commune object from the database based on its com_name
    public function getByName( string $name ){
        $q = $this->_db->query('SELECT * FROM `commune` WHERE `com_name` = '.$name);
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new Commune($data);
        }
    }

    // get list of all commune
    public function getList(){
        $communes = [];
        $q = $this->_db->query('SELECT * FROM `commune` ORDER BY `com_name`');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $communes[] = new Commune($data);
        }
        return $communes;
    }
    // get list of all arrondissements in the given departement
    public function getListByParent( $arr ){
        $communes = [];
        $q = $this->_db->query('SELECT * FROM `commune` WHERE `arr_code`="'.$arr->getId().'" ORDER BY `com_name`');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $communes[] = new Commune($data);
        }
        return $communes;
    }

    // update the arrondissement object in the database
    public function update( $com ){
        $q = $this->_db->prepare(
            'UPDATE `commune` SET '
            .'`com_name` = :name, '
            .'`epci` = :svg, '
            .'`arr_code` = :arr, '
            .'`zone_no` = :zone '
            .'WHERE `com_code` = :code'
        );
        $q->bindValue(':code', $com->getId());
        $q->bindValue(':name', $com->getName());
        $q->bindValue(':epci', $com->getEPCI());
        $q->bindValue(':arr', $com->getParent());
        $q->bindValue(':zone', $com->getZoneEmploi());
        $q->execute();
    }

}