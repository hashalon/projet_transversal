<?php
/*
    phpunit --bootstrap Test.php model/UserTest.php
*/
class UserTest extends \PHPUnit_Framework_TestCase{

    // Constructor's tests
    public function testConstructor_1(){
        $user = new User();
    }
    public function testConstructor_2(){
        $user = new User([]);
    }
    public function testConstructor_3(){
        $user = new User([
            'user_id' => 1,
            'user_isAdmin' => FALSE,
            'user_entity' => "Suivi Client",
            'user_first_name' => "Jean",
            'user_last_name' => "Pierre",
            'user_email' => "jean@pierre.fr",
            'user_address' => "3, place Jean Jaures 41000 Blois",
            'user_phone' => "0254552108",
            'user_password' => "test"
        ]);
    }
    public function testConstructor_4(){
        $user = new User([
            'user_id' => -1,
            'user_isAdmin' => "FALSE",
            'user_entity' => 1,
            'user_first_name' => 1,
            'user_last_name' => 1,
            'user_email' => "jeanpierre.fr",
            'user_address' => 1,
            'user_phone' => 0254552108,
            'user_password' => 1
        ]);
    }
    public function testConstructor_5(){
        $user = new User([
            'user_id' => '1',
            'user_isAdmin' => 'FALSE',
            'user_entity' => "Suivi Client",
            'user_first_name' => "Jean",
            'user_last_name' => "Pierre",
            'user_email' => "jean@pierre.fr",
            'user_address' => "3, place Jean Jaures 41000 Blois",
            'user_phone' => 0254552108,
            'user_password' => "test"
        ]);
    }

    // Id's tests
    public function testId_1(){
        $user = new User([ 'user_id' => 1 ]);
        $this->assertEquals( $user->getId(), 1 );
    }
    public function testId_2(){
        $user = new User([ 'user_id' => 1 ]);
        $user->setId(2);
        $this->assertEquals( $user->getId(), 2 );
    }
    public function testId_3(){
        $user = new User([ 'user_id' => 1 ]);
        $user->setId(-2);
        $this->assertEquals( $user->getId(), 1 );
    }
    public function testId_4(){
        $user = new User([ 'user_id' => -1 ]);
        $this->assertEquals( $user->getId(), null );
    }
    public function testId_5(){
        $user = new User([]);
        $this->assertEquals( $user->getId(), null );
    }
    
    // isAdmin's tests
    public function testIsAdmin_1(){
        $user = new User([ 'user_isAdmin' => TRUE ]);
        $this->assertEquals( $user->getIsAdmin(), TRUE );
    }
    public function testIsAdmin_2(){
        $user = new User([ 'user_isAdmin' => 1 ]);
        $this->assertEquals( $user->getIsAdmin(), TRUE );
    }
    public function testIsAdmin_3(){
        $user = new User([ 'user_isAdmin' => "FALSE" ]);
        $this->assertEquals( $user->getIsAdmin(), TRUE );
    }
    public function testIsAdmin_4(){
        $user = new User([ 'user_isAdmin' => '1' ]);
        $this->assertEquals( $user->getIsAdmin(), TRUE );
    }
    public function testIsAdmin_5(){
        $user = new User([ 'user_isAdmin' => TRUE ]);
        $user->setIsAdmin(FALSE);
        $this->assertEquals( $user->getIsAdmin(), FALSE );
    }
    public function testIsAdmin_6(){
        $user = new User([ 'user_isAdmin' => FALSE ]);
        $user->setIsAdmin();
        $this->assertEquals( $user->getIsAdmin(), FALSE );
    }
    public function testIsAdmin_7(){
        $user = new User([]);
        $user->setIsAdmin(TRUE);
        $this->assertEquals( $user->getIsAdmin(), TRUE );
    }
    public function testIsAdmin_8(){
        $user = new User([]);
        $this->assertEquals( $user->getIsAdmin(), null );
    }

    // entity's tests
    public function testEntity_1(){
        $user = new User([ 'user_entity' => "Suivi client" ]);
        $this->assertEquals( $user->getEntity(), "Suivi client" );
    }
    public function testEntity_2(){
        $user = new User([ 'user_entity' => "Suivi client" ]);
        $user->setEntity("Entreprise");
        $this->assertEquals( $user->getEntity(), "Entreprise" );
    }
    public function testEntity_3(){
        $user = new User([ 'user_entity' => "Suivi client" ]);
        $user->setEntity(0);
        $this->assertEquals( $user->getEntity(), "Suivi client" );
    }
    public function testEntity_4(){
        $user = new User([ 'user_entity' => 1 ]);
        $this->assertEquals( $user->getEntity(), null );
    }
    public function testEntity_5(){
        $user = new User([]);
        $this->assertEquals( $user->getEntity(), null );
    }
    
    // firstname's tests
    public function testFirstName_1(){
        $user = new User([ 'user_first_name' => "Jean" ]);
        $this->assertEquals( $user->getFirstName(), "Jean" );
    }
    public function testFirstName_2(){
        $user = new User([ 'user_first_name' => "Jean" ]);
        $user->setFirstName("Pierre");
        $this->assertEquals( $user->getFirstName(), "Pierre" );
    }
    public function testFirstName_3(){
        $user = new User([ 'user_first_name' => "Jean" ]);
        $user->setFirstName(0);
        $this->assertEquals( $user->getFirstName(), "Jean" );
    }
    public function testFirstName_4(){
        $user = new User([ 'user_first_name' => 1 ]);
        $this->assertEquals( $user->getFirstName(), null );
    }
    public function testFirstName_5(){
        $user = new User([]);
        $this->assertEquals( $user->getFirstName(), null );
    }
    
    // lastname's tests
    public function testLastName_1(){
        $user = new User([ 'user_last_name' => "Dupont" ]);
        $this->assertEquals( $user->getLastName(), "Dupont" );
    }
    public function testLastName_2(){
        $user = new User([ 'user_last_name' => "Dupont" ]);
        $user->setLastName("Dubois");
        $this->assertEquals( $user->getLastName(), "Dubois" );
    }
    public function testLastName_3(){
        $user = new User([ 'user_last_name' => "Dupont" ]);
        $user->setLastName(0);
        $this->assertEquals( $user->getLastName(), "Dupont" );
    }
    public function testLastName_4(){
        $user = new User([ 'user_last_name' => 1 ]);
        $this->assertEquals( $user->getLastName(), null );
    }
    public function testLastName_5(){
        $user = new User([]);
        $this->assertEquals( $user->getLastName(), null );
    }

    // email's tests
    public function testEmail_1(){
        $user = new User([ 'user_email' => "jean@dupont.fr" ]);
        $this->assertEquals( $user->getEmail(), "jean@dupont.fr" );
    }
    public function testEmail_2(){
        $user = new User([ 'user_email' => "jeandupont.fr" ]);
        $this->assertEquals( $user->getEmail(), null );
    }
    public function testEmail_3(){
        $user = new User([ 'user_email' => "jean@dupont.fr" ]);
        $user->setEmail("pierre@dubois.fr");
        $this->assertEquals( $user->getEmail(), "pierre@dubois.fr" );
    }
    public function testEmail_4(){
        $user = new User([ 'user_email' => "jean@dupont.fr" ]);
        $user->setEmail("pierredubois.fr");
        $this->assertEquals( $user->getEmail(), "jean@dupont.fr" );
    }
    public function testEmail_5(){
        $user = new User([ 'user_email' => "jean@dupont.fr" ]);
        $user->setEmail(1);
        $this->assertEquals( $user->getEmail(), "jean@dupont.fr" );
    }
    public function testEmail_6(){
        $user = new User([ 'user_email' => 1 ]);
        $this->assertEquals( $user->getEmail(), null );
    }
    public function testEmail_7(){
        $user = new User([]);
        $this->assertEquals( $user->getEmail(), null );
    }
    
    // address's tests
    public function testAddress_1(){
        $user = new User([ 'user_address' => "3, place Jean Jaures 41000 Blois" ]);
        $this->assertEquals( $user->getAddress(), "3, place Jean Jaures 41000 Blois" );
    }
    public function testAddress_2(){
        $user = new User([ 'user_address' => "3, place Jean Jaures 41000 Blois" ]);
        $user->setAddress("60 rue du Plat d’Etain, BP 12050, 37020 TOURS CEDEX 1");
        $this->assertEquals( $user->getAddress(), "60 rue du Plat d’Etain, BP 12050, 37020 TOURS CEDEX 1" );
    }
    public function testAddress_3(){
        $user = new User([ 'user_address' => "3, place Jean Jaures 41000 Blois" ]);
        $user->setAddress(0);
        $this->assertEquals( $user->getAddress(), "3, place Jean Jaures 41000 Blois" );
    }
    public function testAddress_4(){
        $user = new User([ 'user_address' => 1 ]);
        $this->assertEquals( $user->getAddress(), null );
    }
    public function testAddress_5(){
        $user = new User([]);
        $this->assertEquals( $user->getAddress(), null );
    }
    
    // phone's tests
    public function testPhone_1(){
        $user = new User([ 'user_phone' => "0254552108" ]);
        $this->assertEquals( $user->getPhone(), "0254552108" );
    }
    public function testPhone_2(){
        $user = new User([ 'user_phone' => "0254552108" ]);
        $user->setPhone("0247368036");
        $this->assertEquals( $user->getPhone(), "0247368036" );
    }
    public function testPhone_3(){
        $user = new User([ 'user_phone' => "0254552108" ]);
        $user->setPhone(0247368036);
        $this->assertEquals( $user->getPhone(), "0254552108" );
    }
    public function testPhone_4(){
        $user = new User([ 'user_phone' => 0254552108 ]);
        $user->setPhone("0247368036");
        $this->assertEquals( $user->getPhone(), "0247368036" );
    }
    public function testPhone_5(){
        $user = new User([ 'user_phone' => 0254552108 ]);
        $this->assertEquals( $user->getPhone(), null );
    }
    public function testPhone_6(){
        $user = new User([]);
        $this->assertEquals( $user->getPhone(), null );
    }
    
    // password's tests
    public function testPassword_1(){
        $user = new User([ 'user_password' => "123" ]);
        $this->assertEquals( $user->getPassword(), "123" );
    }
    public function testPassword_2(){
        $user = new User([ 'user_password' => "123" ]);
        $user->setPassword("456");
        $this->assertEquals( $user->getPassword(), "456" );
    }
    public function testPassword_3(){
        $user = new User([ 'user_password' => "123" ]);
        $user->setPassword(456);
        $this->assertEquals( $user->getPassword(), "123" );
    }
    public function testPassword_4(){
        $user = new User([ 'user_password' => 123 ]);
        $user->setPassword("456");
        $this->assertEquals( $user->getPassword(), "456" );
    }
    public function testPassword_5(){
        $user = new User([ 'user_password' => 123 ]);
        $this->assertEquals( $user->getPassword(), null );
    }
    public function testPassword_6(){
        $user = new User([]);
        $this->assertEquals( $user->getPassword(), null );
    }

}