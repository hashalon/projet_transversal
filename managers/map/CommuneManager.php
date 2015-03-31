<?php

require_once ($RootDir.'managers/abstract/BaseManager.php');
require_once ($RootDir.'managers/interface/MapInterface.php');

require_once ($RootDir.'models/map/Arrondissement.php');
require_once ($RootDir.'models/map/Commune.php');

require_once($RootDir.'models/criteria/Deces.php');
require_once($RootDir.'models/criteria/Naissances.php');
require_once($RootDir.'models/criteria/Travailleurs.php');
require_once($RootDir.'models/criteria/Defm.php');
require_once($RootDir.'models/criteria/EtablissementsActifs.php');
require_once($RootDir.'models/criteria/Logements.php');
require_once($RootDir.'models/criteria/Menages.php');
require_once($RootDir.'models/criteria/Population.php');
require_once($RootDir.'models/criteria/RevenusFiscaux.php');

class CommuneManager extends BaseManager implements MapInterface{

    // add a commune entry to the database
    public function add( &$com ){
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
    // get list of all communes in the given arrondissement
    public function getListByParent( &$arr ){
        return $this->getListByParentId( $arr->getId() );
    }
    public function getListByParentId( $arr_id ){
        $communes = [];
        $q = $this->_db->query('SELECT * FROM `commune` WHERE `arr_code`="'.$arr_id.'" ORDER BY `com_name`');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $communes[] = new Commune($data);
        }
        return $communes;
    }
    

    // update the arrondissement object in the database
    public function update( &$com ){
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
    
    public function getDeces( Commune &$com ){
        $deces = [];
        $q = $this->_db->query( 'SELECT * FROM `deces` WHERE `com_code` = '.$com->getId() );
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            $deces[] = new Deces($data);
        }
        return $deces;
    }
    public function getNaissances( Commune &$com ){
        $naiss = [];
        $q = $this->_db->query( 'SELECT * FROM `naissance` WHERE `com_code` = '.$com->getId() );
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            $naiss[] = new Naissances($data);
        }
        return $naiss;
    }
    public function getTravailleurs( Commune &$com ){
        $trav = [];
        $q = $this->_db->query( 'SELECT * FROM `travailleurs` WHERE `com_code` = '.$com->getId() );
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){

            $data['_cats'] = [];
            $q2 = $this->_db->query('SELECT * FROM `categorie_age` WHERE `cat_id` = '.$data['cat_id']);
            while( $data2 = $q2->fetch(PDO::FETCH_ASSOC) ){
                $data['_cats'][] = $data2['cat_name'];
            }
            $trav[] = new Travailleurs($data);
        }
        return $trav;
    }
    public function getDefm( Commune &$com ){
        $defms = [];
        $q = $this->_db->query( 'SELECT * FROM `defm` WHERE `com_code` = '.$com->getId() );
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){

            $data['_types'] = [];
            $q2 = $this->_db->query('SELECT * FROM `defm_category` WHERE `defmcat_id` = '.$data['defmcat_id']);
            while( $data2 = $q2->fetch(PDO::FETCH_ASSOC) ){
                $data['_types'][] = $data2['defm_cat'];
            }
            $defms[] = new Defm($data);
        }
        return $defms;
    }
    public function getEtablissements( Commune &$com ){
        $etabs = [];
        $q = $this->_db->query( 'SELECT * FROM `etabl_activ` WHERE `com_code` = '.$com->getId() );
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){

            $data['_types'] = [];
            $q2 = $this->_db->query('SELECT * FROM `etablissement` WHERE `etabl_id` = '.$data['etabl_id']);
            while( $data2 = $q2->fetch(PDO::FETCH_ASSOC) ){
                $data['_types'][] = $data2['etabl_type'];
            }
            $etabs[] = new EtablissementsActifs($data);
        }
        return $etabs;
    }
    public function getLogements( Commune &$com ){
        $logs = [];
        $q = $this->_db->query( 'SELECT * FROM `logements` WHERE `com_code` = '.$com->getId() );
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            
            $data['_types'] = [];
            $q2 = $this->_db->query('SELECT * FROM `log_type` WHERE `log_type_id` = '.$data['log_type_id']);
            while( $data2 = $q2->fetch(PDO::FETCH_ASSOC) ){
                $data['_types'][] = $data2['log_name'];
            }
            $logs[] = new Logements($data);
        }
        return $logs;
    }
    public function getMenages( Commune &$com ){
        $menas = [];
        $q = $this->_db->query( 'SELECT * FROM `menages` WHERE `com_code` = '.$com->getId() );
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){

            $data['_types'] = [];
            $q2 = $this->_db->query('SELECT * FROM `menage_type` WHERE `mt_id` = '.$data['mt_id']);
            while( $data2 = $q2->fetch(PDO::FETCH_ASSOC) ){
                $data['_types'][] = $data2['mt_name'];
            }
            $menas[] = new Menages($data);
        }
        return $menas;
    }
    public function getPopulation( Commune &$com ){
        $pops = [];
        $q = $this->_db->query( 'SELECT * FROM `population` WHERE `com_code` = '.$com->getId() );
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){

            $data['_types'] = [];
            $q2 = $this->_db->query('SELECT * FROM `pop_type` WHERE `pt_id` = '.$data['pt_id']);
            while( $data2 = $q2->fetch(PDO::FETCH_ASSOC) ){
                $data['_types'][] = $data2['pt_type'];
            }
            
            $data['_cats'] = [];
            $q2 = $this->_db->query('SELECT * FROM `categorie_age` WHERE `cat_id` = '.$data['cat_id']);
            while( $data2 = $q2->fetch(PDO::FETCH_ASSOC) ){
                $data['_cats'][] = $data2['cat_type'];
            }
            
            $pops[] = new Menages($data);
        }
        return $pops;
    }
    public function getRevenusFiscaux( Commune &$com ){
        $fiscs = [];
        $q = $this->_db->query( 'SELECT * FROM `revenue_fisc` WHERE `com_code` = '.$com->getId() );
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            $fiscs[] = new Naissances($data);
        }
        return $fiscs;
    }
    

}