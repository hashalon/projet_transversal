<?php
/*
    phpunit --bootstrap Test.php model/ProjectTest.php
*/
class DepartementTest extends \PHPUnit_Framework_TestCase{

 public function setUp(){
         require_once 'Departement.php';
          $this-> Departement = new Departement();
    }
 public function hydrate( array &$data ){
        $this->hmatch( $data, 'setId', 'dep_no' );
        $this->hmatch( $data, 'setName', 'dep_name' );
        $this->hmatch( $data, 'setParent', 'reg_no' );
        $this->hmatch( $data, 'setSvg', 'dep_svg' );
        $this->hmatch( $data, 'setChildren', '_children' );
    }
       
}
?>