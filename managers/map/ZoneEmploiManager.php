<?php

require_once ($RootDir.'managers/abstract/MapElementManager.php');
require_once ($RootDir.'models/map/ZoneEmploi.php');
require_once ($RootDir.'models/map/Commune.php');

class ZoneEmploiManager extends MapElementManager{

    // add a arrondissement entry to the database
    public function add( $zone ){
        $q = $this->_db->prepare(
            'INSERT INTO `zone_demploi` SET '
            .'`zone_no` = :no, '
            .'`zone_name` = :name, '
            .'`emploi` = :emploi, '
            .'`taux_chomage` = :chomage '
        );
        $q->bindValue(':no', $dep->getId());
        $q->bindValue(':name', $dep->getName());
        $q->bindValue(':emploi', $dep->getEmploi());
        $q->bindValue(':chomage', $dep->getTauxChomage());
        $q->execute();
    }

    // not necessary
    public function delete( $id ){
    }

    // get the zone_demploi object from the database based on its zone_no
    public function get( $id ){
        $q = $this->_db->query('SELECT * FROM `zone_demploi` WHERE `zone_code` = '.$id);
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new ZoneEmploi($data);
        }
    }
    // get the zone_demploi object from the database based on its zone_name
    public function getByName( string $name ){
        $q = $this->_db->query('SELECT * FROM `zone_demploi` WHERE `zone_name` = '.$name);
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new ZoneEmploi($data);
        }
    }
    // gives the parent zone_demploi of this commune object
    public function getByCommune( Commune $com ){
        $q = $this->_db->query('SELECT * FROM `zone_demploi` NATURAL JOIN `commune` WHERE `com_code`="'.$com->getId().'"');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new ZoneEmploi($data);
        }
    }
    // gives the parent zone_demploi of this commune name
    public function getByCommuneName( string $name ){
        $name = (string) $name;
        $q = $this->_db->query('SELECT * FROM `zone_demploi` NATURAL JOIN `commune` WHERE `com_name`="'.$name.'"');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new ZoneEmploi($data);
        }
    }

    // get list of all zone_demplois
    public function getList(){
        $zones = [];
        $q = $this->_db->query('SELECT * FROM `zone_demploi` ORDER BY `zone_name`');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $zones[] = new ZoneEmploi($data);
        }
        return $zones;
    }

    // update the arrondissement object in the database
    public function update( $zone ){
        $q = $this->_db->prepare(
            'UPDATE `zone_demploi` SET '
            .'`zone_name` = :name, '
            .'`emploi` = :emploi, '
            .'`taux_chomage` = :chomage '
            .'WHERE `zone_no` = :no'
        );
        $q->bindValue(':no', $zone->getId());
        $q->bindValue(':name', $zone->getName());
        $q->bindValue(':emploi', $zone->getEmploi());
        $q->bindValue(':chomage', $zone->getTauxChomage());
        $q->execute();
    }

}