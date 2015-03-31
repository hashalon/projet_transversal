<?php

require_once ($RootDir.'managers/abstract/BaseManager.php');
require_once ($RootDir.'managers/interface/MapSvgInterface.php');

require_once ($RootDir.'models/map/Departement.php');
require_once ($RootDir.'models/map/Arrondissement.php');
require_once ($RootDir.'models/map/Commune.php');

class populationManager  {
    
  


    public function getActif( $id ){
        $q = $this->_db->query('SELECT SUM( FROM `arrondissement` WHERE `arr_code` = "'.$id.'";');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new Arrondissement($data);
        }
    }

    
    public function getTravailleursByCom( $com_code ){
        $q = $this->_db->query('SELECT SUM(tr_number) FROM `travailleurs` WHERE `com_code` = "'.$com_code.'";');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return $data['tr_number'];
        }
    }

    
    public function getTravailleursByDep( $dep_code ){
        $q = $this->_db->query('SELECT * FROM `arrondissement` WHERE `arr_svg` = "'.$svg.'";');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new Arrondissement($data);
        }
    }
    // gives the parent arrondissement of this commune object
    public function getByCommune( Commune &$com ){
        $q = $this->_db->query('SELECT * FROM `arrondissement` NATURAL JOIN `commune` WHERE `com_code`= "'.$com->getId().'";');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new Arrondissement($data);
        }
    }
    // gives the parent arrondissement of this commune name
    public function getByCommuneName( $name ){
        $name = (string) $name;
        $q = $this->_db->query('SELECT * FROM `arrondissement` NATURAL JOIN `commune` WHERE `com_name`= "'.$name.'";');
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new Arrondissement($data);
        }
    }

    // get list of all arrondissements
    public function getList(){
        $arrondissements = [];
        $q = $this->_db->query('SELECT * FROM `arrondissement` ORDER BY `arr_name`;');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $arrondissements[] = new Arrondissement($data);
        }
        return $arrondissements;
    }
    // get list of all arrondissements in the given departement
    public function getListByParent( &$dep ){
        return $this->getListByParentId( $dep->getId() );
    }
    public function getListByParentId( $dep_id ){
        $arrondissements = [];
        $q = $this->_db->query('SELECT * FROM `arrondissement` WHERE `dep_no`= "'.$dep_id.'" ORDER BY `arr_name`;');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $arrondissements[] = new Arrondissement($data);
        }
        return $arrondissements;
    }

    // update the arrondissement object in the database
    public function update( &$arr ){
        $q = $this->_db->prepare(
            'UPDATE `arrondissement` SET '
            .'`arr_name` = :name, '
            .'`arr_svg` = :svg, '
            .'`dep_no` = :dep '
            .'WHERE `arr_code` = :code'
        );
        $q->bindValue(':code', $dep->getId());
        $q->bindValue(':name', $dep->getName());
        $q->bindValue(':svg', $dep->getSvg());
        $q->bindValue(':dep', $dep->getParent());
        $q->execute();
    }
    
}