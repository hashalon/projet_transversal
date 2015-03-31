<?php

require_once ($RootDir.'managers/abstract/BaseManager.php');
require_once ($RootDir.'managers/interface/MapSvgInterface.php');

require_once ($RootDir.'models/map/Region.php');
require_once ($RootDir.'models/map/Departement.php');

class RegionManager extends BaseManager implements MapSvgInterface{
    
    // add a region entry to the database
    public function add( &$region ){
        $q = $this->_db->prepare(
            'INSERT INTO `region` SET '
            .'`reg_no` = :no, '
            .'`reg_name` = :name, '
            .'`reg_svg` = :svg '
        );
        $q->bindValue(':no', $user->getId());
        $q->bindValue(':name', $user->getName());
        $q->bindValue(':svg', $user->getSvg());
        $q->execute();
    }

    // get the region object from the database based on its reg_no
    public function get( $id ){
        $q = $this->_db->query('SELECT * FROM `region` WHERE `reg_no` = "'.$id.'";');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new Region($data);
        }
    }
    // get the region object from the database based on its reg_name
    public function getByName( $name ){
        $q = $this->_db->query('SELECT * FROM `region` WHERE `reg_name` = "'.$name.'";');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new Region($data);
        }
    }
    // get the region object from the database based on its reg_svg
    public function getBySvg( $svg ){
        $q = $this->_db->query('SELECT * FROM `region` WHERE `reg_svg` = "'.$svg.'";');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new Region($data);
        }
    }
    // gives the parent region of this departement object
    public function getByDepartement( Departement &$dep ){
        $q = $this->_db->query('SELECT * FROM `region` NATURAL JOIN `departement` WHERE `dep_no`="'.$dep->getId().'";');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new Region($data);
        }
    }
    // gives the parent region of this departement name
    public function getByDepartementName( $name ){
        $name = (string) $name;
        $q = $this->_db->query('SELECT * FROM `region` NATURAL JOIN `departement` WHERE `dep_name`="'.$name.'";');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new Region($data);
        }
    }

    // get list of all regions
    public function getList(){
        $regions = [];
        $q = $this->_db->query('SELECT * FROM `region` ORDER BY `reg_name`');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $regions[] = new Region($data);
        }
        return $regions;
    }
    // in this case getListByParent = getList
    public function getListByParent( &$object ){
        return getList();
    }
    public function getListByParentId( $id ){
        return getList();
    }

    // update the region object in the database
    public function update( &$reg ){
        $q = $this->_db->prepare(
            'UPDATE `region` SET '
            .'`reg_name` = :name, '
            .'`reg_svg` = :svg '
            .'WHERE `reg_no` = :no'
        );
        $q->bindValue(':no', $reg->getId());
        $q->bindValue(':name', $reg->getName());
        $q->bindValue(':svg', $reg->getSvg());
        $q->execute();
    }
    
}