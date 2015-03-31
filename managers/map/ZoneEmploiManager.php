<?php

require_once ($RootDir.'managers/abstract/BaseManager.php');
require_once ($RootDir.'managers/interface/MapInterface.php');

require_once ($RootDir.'models/map/ZoneEmploi.php');
require_once ($RootDir.'models/map/Commune.php');

require_once ($RootDir.'models/criteria/Chomage.php');
require_once ($RootDir.'models/criteria/Travailleurs.php');

class ZoneEmploiManager extends BaseManager implements MapInterface{

    // add a arrondissement entry to the database
    public function add( &$zone ){
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

    // get the zone_demploi object from the database based on its zone_no
    public function get( $id ){
        $q = $this->_db->query('SELECT * FROM `zone_demploi` WHERE `zone_code` = "'.$id.'";');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            $this->getCriterias($data, $id);
            return new ZoneEmploi($data);
        }
    }
    // get the zone_demploi object from the database based on its zone_name
    public function getByName( $name ){
        $q = $this->_db->query('SELECT * FROM `zone_demploi` WHERE `zone_name` = "'.$name.'";');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            $this->getCriterias($data, $data['zone_no']);
            return new ZoneEmploi($data);
        }
    }
    // gives the parent zone_demploi of this commune object
    public function getByCommune( Commune &$com ){
        $q = $this->_db->query('SELECT * FROM `zone_demploi` NATURAL JOIN `commune` WHERE `com_code`= "'.$com->getId().'";');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            $this->getCriterias($data, $data['zone_no']);
            return new ZoneEmploi($data);
        }
    }
    // gives the parent zone_demploi of this commune name
    public function getByCommuneName( $name ){
        $name = (string) $name;
        $q = $this->_db->query('SELECT * FROM `zone_demploi` NATURAL JOIN `commune` WHERE `com_name`= "'.$name.'";');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            $this->getCriterias($data, $data['zone_no']);
            return new ZoneEmploi($data);
        }
    }
    
    // get list of all zone_demplois
    public function getList(){
        $zones = [];
        $q = $this->_db->query('SELECT * FROM `zone_demploi` ORDER BY `zone_name`;');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $this->getCriterias($data, $data['zone_no']);
            $zones[] = new ZoneEmploi($data);
        }
        return $zones;
    }
    // in this case getListByParent = getList
    public function getListByParent( &$object ){
        return getList();
    }
    public function getListByParentId( $id ){
        return getList();
    }
    
    // return the number of communes in the given zone
    public function getNumberOfCommunes( &$zone ){
        return $this->getNumberOfCommunesById( $zone->getId() );
    }
    public function getNumberOfCommunesById( $zone_id ){
        $count = 0;
        $q = $this->_db->query('SELECT * FROM `commune` WHERE `zone_no`="'.$zone_id.'" ORDER BY `com_name`;');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            ++$count;
        }
        return $count;
    }

    // update the arrondissement object in the database
    public function update( &$zone ){
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

    protected function getCriterias(array &$data, $id){
        $data['_chom'] = $this->getChomage($id);
        $data['_trav'] = $this->getTravailleurs($id);
    }
    
    public function getChomage($zone){
        $chom = [];
        $q = $this->_db->query('SELECT * FROM `chomage` WHERE `zone_no` = "'.$zone.'";');
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            $chom[] = new Chomage($data);
        }
        return $chom;
    }
    public function getTravailleurs($zone){
        $trav = [];
        $q = $this->_db->query('SELECT * FROM `travailleurs` WHERE `zone_no` = "'.$zone.'";');
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){

            $data['_cats'] = [];
            $q2 = $this->_db->query('SELECT * FROM `categorie_age` WHERE `cat_id` = "'.$data['cat_id'].'";');
            while( $data2 = $q2->fetch(PDO::FETCH_ASSOC) ){
                $data['_cats'][] = $data2['cat_name'];
            }
            $trav[] = new Travailleurs($data);
        }
        return $trav;
    }
    
}