<?php
/*
    phpunit --bootstrap Test.php model/UserTest.php
*/
class RegionTest extends \PHPUnit_Framework_TestCase{

    public function setUp(){
         require_once 'Region.php';
          $this-> Region = new Region();
    }
    public function testFunctionHydrate(array &$data){
        $this->hmatch( $data, 1, 1 );
        $this->hmatch( $data, 'Guadeloupe', 'reg_Guadeloupe' );
        $this->setParent("France");
        $this->hmatch( $data, 'setSvg', 'reg_svg' );
        $this->hmatch( $data, 'setChildren', '_children' );
    }
   
  }
  ?>