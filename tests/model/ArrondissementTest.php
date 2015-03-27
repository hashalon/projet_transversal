<?php
/*
    phpunit --bootstrap Test.php model/DemandTest.php
*/
class DemandTest extends \PHPUnit_Framework_TestCase{

    // constructor's tests
    public function testConstructor_1(){
        $demand = new Demand();
    }
    public function testConstructor_2(){
        $demand = new Demand([]);
    }
    public function testConstructor_3(){
        $demand = new Demand([
            'demand_id' => '1',
            'demand_title' => "demand",
            'demand_content' => "content",
            'user_id' => '1',
            'project_id' => '1',
            'demand_date_creation' => "1970-01-01",
            'demand_date_wished' => "1970-01-01",
            'demand_date_test' => "1970-01-01",
            'demand_date_test_validation' => "1970-01-01",
            'demand_production' => "1970-01-01",
            'demand_production_validation' => "197-01-01"
        ]);
    }
    public function testConstructor_4(){
        $demand = new Demand([
            'demand_id' => "hello",
            'demand_title' => 10,
            'demand_content' => 50,
            'user_id' => "user",
            'project_id' => "project",
            'demand_date_creation' => 19700101,
            'demand_date_wished' => 19700101,
            'demand_date_test' => 19700101,
            'demand_date_test_validation' => 19700101,
            'demand_production' => 19700101,
            'demand_production_validation' => 1970101
        ]);
    }
    public function testConstructor_5(){
        $demand = new Demand([
            'demand_id' => 1,
            'demand_title' => "demand",
            'demand_content' => "content",
            'user_id' => 1,
            'project_id' => 1,
            'demand_date_creation' => "1970-01-01",
            'demand_date_wished' => "1970-01-01",
            'demand_date_test' => "1970-01-01",
            'demand_date_test_validation' => "1970-01-01",
            'demand_production' => "1970-01-01",
            'demand_production_validation' => "197-01-01"
        ]);
    }

    // id's tests
    public function testId_1(){
        $demand = new Demand([ 'demand_id' => 1 ]);
        $this->assertEquals( $demand->getId(), 1 );
    }
    public function testId_2(){
        $demand = new Demand([ 'demand_id' => 1 ]);
        $demand->setId(2);
        $this->assertEquals( $demand->getId(), 2 );
    }
    public function testId_3(){
        $demand = new Demand([ 'demand_id' => 1 ]);
        $demand->setId(-2);
        $this->assertEquals( $demand->getId(), 1 );
    }
    public function testId_4(){
        $demand = new Demand([ 'demand_id' => -1 ]);
        $this->assertEquals( $demand->getId(), null );
    }
    public function testId_5(){
        $demand = new Demand([]);
        $this->assertEquals( $demand->getId(), null );
    }

    // title's tests
    public function testTitle_1(){
        $demand = new Demand([ 'demand_title' => "hello" ]);
        $this->assertEquals( $demand->getTitle(), "hello" );
    }
    public function testTitle_2(){
        $demand = new Demand([ 'demand_title' => "hello" ]);
        $demand->setTitle("hola");
        $this->assertEquals( $demand->getTitle(), "hola" );
    }
    public function testTitle_3(){
        $demand = new Demand([ 'demand_title' => "hello" ]);
        $demand->setId(0);
        $this->assertEquals( $demand->getTitle(), "hello" );
    }
    public function testTitle_4(){
        $demand = new Demand([ 'demand_title' => 1 ]);
        $this->assertEquals( $demand->getTitle(), null );
    }
    public function testTitle_5(){
        $demand = new Demand([]);
        $this->assertEquals( $demand->getTitle(), null );
    }
    
    // content's tests
    public function testContent_1(){
        $demand = new Demand([ 'demand_content' => "long hello" ]);
        $this->assertEquals( $demand->getContent(), "long hello" );
    }
    public function testContent_2(){
        $demand = new Demand([ 'demand_content' => "long hello" ]);
        $demand->setContent("grand hola");
        $this->assertEquals( $demand->getContent(), "grand hola" );
    }
    public function testContent_3(){
        $demand = new Demand([ 'demand_content' => "long hello" ]);
        $demand->setId(0);
        $this->assertEquals( $demand->getContent(), "long hello" );
    }
    public function testContent_4(){
        $demand = new Demand([ 'demand_content' => 1 ]);
        $this->assertEquals( $demand->getContent(), null );
    }
    public function testContent_5(){
        $demand = new Demand([]);
        $this->assertEquals( $demand->getContent(), null );
    }

    // user id's tests
    public function testUser_1(){
        $demand = new Demand([ 'user_id' => 1 ]);
        $this->assertEquals( $demand->getUser(), 1 );
    }
    public function testUser_2(){
        $demand = new Demand([ 'user_id' => 1 ]);
        $demand->setUser(2);
        $this->assertEquals( $demand->getUser(), 2 );
    }
    public function testUser_3(){
        $demand = new Demand([ 'user_id' => 1 ]);
        $demand->setUser(-2);
        $this->assertEquals( $demand->getUser(), 1 );
    }
    public function testUser_4(){
        $demand = new Demand([ 'user_id' => -1 ]);
        $this->assertEquals( $demand->getUser(), null );
    }
    public function testUser_5(){
        $demand = new Demand([]);
        $this->assertEquals( $demand->getUser(), null );
    }
    
    // project id's tests
    public function testProject_1(){
        $demand = new Demand([ 'project_id' => 1 ]);
        $this->assertEquals( $demand->getProject(), 1 );
    }
    public function testProject_2(){
        $demand = new Demand([ 'project_id' => 1 ]);
        $demand->setProject(2);
        $this->assertEquals( $demand->getProject(), 2 );
    }
    public function testProject_3(){
        $demand = new Demand([ 'project_id' => 1 ]);
        $demand->setProject(-2);
        $this->assertEquals( $demand->getProject(), 1 );
    }
    public function testProject_4(){
        $demand = new Demand([ 'project_id' => -1 ]);
        $this->assertEquals( $demand->getProject(), null );
    }
    public function testProject_5(){
        $demand = new Demand([]);
        $this->assertEquals( $demand->getProject(), null );
    }
    
    // date creation's tests
    public function testDateCreation_1(){
        $demand = new Demand([ 'demand_date_creation' => "1970-01-01" ]);
        $this->assertEquals( $demand->getDateCreation(), "1970-01-01" );
    }
    public function testDateCreation_2(){
        $demand = new Demand([ 'demand_date_creation' => "1970-01-01" ]);
        $demand->setDateCreation("2000-01-01");
        $this->assertEquals( $demand->getDateCreation(), "2000-01-01" );
    }
    public function testDateCreation_3(){
        $demand = new Demand([ 'demand_date_creation' => "1970-01-01" ]);
        $demand->setDateCreation(19700101);
        $this->assertEquals( $demand->getDateCreation(), "1970-01-01" );
    }
    public function testDateCreation_4(){
        $demand = new Demand([ 'demand_date_creation' => 19700101 ]);
        $this->assertEquals( $demand->getDateCreation(), null );
    }
    public function testDateCreation_5(){
        $demand = new Demand([]);
        $this->assertEquals( $demand->getDateCreation(), null );
    }
    
    // date wished's tests
    public function testDateWished_1(){
        $demand = new Demand([ 'demand_date_wished' => "1970-01-01" ]);
        $this->assertEquals( $demand->getDateWished(), "1970-01-01" );
    }
    public function testDateWished_2(){
        $demand = new Demand([ 'demand_date_wished' => "1970-01-01" ]);
        $demand->setDateWished("2000-01-01");
        $this->assertEquals( $demand->getDateWished(), "2000-01-01" );
    }
    public function testDateWished_3(){
        $demand = new Demand([ 'demand_date_wished' => "1970-01-01" ]);
        $demand->setDateWished(19700101);
        $this->assertEquals( $demand->getDateWished(), "1970-01-01" );
    }
    public function testDateWished_4(){
        $demand = new Demand([ 'demand_date_wished' => 19700101 ]);
        $this->assertEquals( $demand->getDateWished(), null );
    }
    public function testDateWished_5(){
        $demand = new Demand([]);
        $this->assertEquals( $demand->getDateWished(), null );
    }
    
    // date test's tests
    public function testDateTest_1(){
        $demand = new Demand([ 'demand_date_test' => "1970-01-01" ]);
        $this->assertEquals( $demand->getDateTest(), "1970-01-01" );
    }
    public function testDateTest_2(){
        $demand = new Demand([ 'demand_date_test' => "1970-01-01" ]);
        $demand->setDateTest("2000-01-01");
        $this->assertEquals( $demand->getDateTest(), "2000-01-01" );
    }
    public function testDateTest_3(){
        $demand = new Demand([ 'demand_date_test' => "1970-01-01" ]);
        $demand->setDateTest(19700101);
        $this->assertEquals( $demand->getDateTest(), "1970-01-01" );
    }
    public function testDateTest_4(){
        $demand = new Demand([ 'demand_date_test' => 19700101 ]);
        $this->assertEquals( $demand->getDateTest(), null );
    }
    public function testDateTest_5(){
        $demand = new Demand([]);
        $this->assertEquals( $demand->getDateTest(), null );
    }
    
    // date test validation's tests
    public function testDateTestValidation_1(){
        $demand = new Demand([ 'demand_date_test_validation' => "1970-01-01" ]);
        $this->assertEquals( $demand->getDateTestValidation(), "1970-01-01" );
    }
    public function testDateTestValidation_2(){
        $demand = new Demand([ 'demand_date_test_validation' => "1970-01-01" ]);
        $demand->setDateTestValidation("2000-01-01");
        $this->assertEquals( $demand->getDateTestValidation(), "2000-01-01" );
    }
    public function testDateTestValidation_3(){
        $demand = new Demand([ 'demand_date_test_validation' => "1970-01-01" ]);
        $demand->setDateTestValidation(19700101);
        $this->assertEquals( $demand->getDateTestValidation(), "1970-01-01" );
    }
    public function testDateTestValidation_4(){
        $demand = new Demand([ 'demand_date_test_validation' => 19700101 ]);
        $this->assertEquals( $demand->getDateTestValidation(), null );
    }
    public function testDateTestValidation_5(){
        $demand = new Demand([]);
        $this->assertEquals( $demand->getId(), null );
    }
    
    // date production's tests
    public function testDateProduction_1(){
        $demand = new Demand([ 'demand_date_production' => "1970-01-01" ]);
        $this->assertEquals( $demand->getDateProduction(), "1970-01-01" );
    }
    public function testDateProduction_2(){
        $demand = new Demand([ 'demand_date_production' => "1970-01-01" ]);
        $demand->setDateProduction("2000-01-01");
        $this->assertEquals( $demand->getDateProduction(), "2000-01-01" );
    }
    public function testDateProduction_3(){
        $demand = new Demand([ 'demand_date_production' => "1970-01-01" ]);
        $demand->setDateProduction(19700101);
        $this->assertEquals( $demand->getDateProduction(), "1970-01-01" );
    }
    public function testDateProduction_4(){
        $demand = new Demand([ 'demand_date_production' => 19700101 ]);
        $this->assertEquals( $demand->getDateProduction(), null );
    }
    public function testDateProduction_5(){
        $demand = new Demand([]);
        $this->assertEquals( $demand->getDateProduction(), null );
    }
    
    // date production validation's tests
    public function testDateProductionValidation_1(){
        $demand = new Demand([ 'demand_date_production_validation' => "1970-01-01" ]);
        $this->assertEquals( $demand->getDateProductionValidation(), "1970-01-01" );
    }
    public function testDateProductionValidation_2(){
        $demand = new Demand([ 'demand_date_production_validation' => "1970-01-01" ]);
        $demand->setDateProductionValidation("2000-01-01");
        $this->assertEquals( $demand->getDateProductionValidation(), "2000-01-01" );
    }
    public function testDateProductionValidation_3(){
        $demand = new Demand([ 'demand_date_production_validation' => "1970-01-01" ]);
        $demand->setDateProductionValidation(19700101);
        $this->assertEquals( $demand->getDateProductionValidation(), "1970-01-01" );
    }
    public function testDateProductionValidation_4(){
        $demand = new Demand([ 'demand_date_production_validation' => 19700101 ]);
        $this->assertEquals( $demand->getDateProductionValidation(), null );
    }
    public function testDateProductionValidation_5(){
        $demand = new Demand([]);
        $this->assertEquals( $demand->getDateProductionValidation(), null );
    }

}