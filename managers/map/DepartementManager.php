<?php

require_once ($RootDir.'managers/abstract/BaseManager.php');
require_once ($RootDir.'managers/interface/MapSvgInterface.php');

require_once ($RootDir.'models/map/Region.php');
require_once ($RootDir.'models/map/Departement.php');
require_once ($RootDir.'models/map/Arrondissement.php');

class DepartementManager extends BaseManager implements MapSvgInterface{
    
    // add a departement entry to the database
    public function add( &$dep ){
        $q = $this->_db->prepare(
            'INSERT INTO `departement` SET '
            .'`dep_no` = :no, '
            .'`dep_name` = :name, '
            .'`dep_svg` = :svg, '
            .'`reg_no` = :reg '
        );
        $q->bindValue(':no', $dep->getId());
        $q->bindValue(':name', $dep->getName());
        $q->bindValue(':svg', $dep->getSvg());
        $q->bindValue(':reg', $dep->getParent());
        $q->execute();
    }

    // get the departement object from the database based on its dep_no
    public function get( $id ){
        $q = $this->_db->query('SELECT * FROM `departement` WHERE `dep_no` = "'.$id.'";');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new Departement($data);
        }
    }
    // get the departement object from the database based on its dep_name
    public function getByName( $name ){
        $q = $this->_db->query('SELECT * FROM `departement` WHERE `dep_name` = "'.$name.'";');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new Departement($data);
        }
    }
    // get the departement object from the database based on its dep_svg
    public function getBySvg( $svg ){
        $q = $this->_db->query('SELECT * FROM `departement` WHERE `dep_svg` = "'.$svg.'";');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new Departement($data);
        }
    }
    // gives the parent departement of this arrondissement object
    public function getByArrondissement( Arrondissement &$arr ){
        $q = $this->_db->query('SELECT * FROM `departement` NATURAL JOIN `arrondissement` WHERE `arr_code`= "'.$arr->getId().'";');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new Departement($data);
        }
    }
    // gives the parent departement of this arrondissement name
    public function getByArrondissementName( $name ){
        $name = (string) $name;
        $q = $this->_db->query('SELECT * FROM `departement` NATURAL JOIN `arrondissement` WHERE `arr_name`= "'.$name.'";');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new Departement($data);
        }
    }

    // get list of all departements
    public function getList(){
        $departements = [];
        $q = $this->_db->query('SELECT * FROM `departement` ORDER BY `dep_name`');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $departements[] = new Departement($data);
        }
        return $departements;
    }
    // get list of all departements in the given region
    public function getListByParent( &$reg ){
        return $this->getListByParentId( $reg->getId() );
    }
    public function getListByParentId( $reg_id ){
        $departements = [];
        $q = $this->_db->query('SELECT * FROM `departement` WHERE `reg_no`="'.$reg_id.'" ORDER BY `dep_name`;');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $departements[] = new Departement($data);
        }
        return $departements;
    }

    // update the departement object in the database
    public function update( &$dep ){
        $q = $this->_db->prepare(
            'UPDATE `departement` SET '
            .'`dep_name` = :name, '
            .'`dep_svg` = :svg, '
            .'`reg_no` = :reg '
            .'WHERE `dep_no` = :no'
        );
        $q->bindValue(':no', $dep->getId());
        $q->bindValue(':name', $dep->getName());
        $q->bindValue(':svg', $dep->getSvg());
        $q->bindValue(':reg', $dep->getParent());
        $q->execute();
    }

}