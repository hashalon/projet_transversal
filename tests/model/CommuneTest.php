<?php
/*
    phpunit --bootstrap Test.php model/CommentTest.php
*/
class CommentTest extends \PHPUnit_Framework_TestCase{

    // constructor's tests
    public function testConstructor_1(){
        $comment = new Comment();
    }
    public function testConstructor_2(){
        $comment = new Comment([]);
    }
    public function testConstructor_3(){
        $comment = new Comment([
            'comment_id' => '1',
            'user_i' => '1',
            'demand_id' => '1',
            'comment_content' => "comment",
            'comment_date' => "1970-01-01"
        ]);
    }
    public function testConstructor_4(){
        $comment = new Comment([
            'comment_id' => "hello",
            'user_i' => "hello",
            'demand_id' => "hello",
            'comment_content' => 100,
            'comment_date' => 19700101
        ]);
    }
    public function testConstructor_5(){
        $comment = new Comment([
            'comment_id' => 1,
            'user_i' => 1,
            'demand_id' => 1,
            'comment_content' => "comment",
            'comment_date' => "1970-01-01"
        ]);
    }

    // id's tests
    public function testId_1(){
        $comment = new Comment([ 'comment_id' => 1 ]);
        $this->assertEquals( $comment->getId(), 1 );
    }
    public function testId_2(){
        $comment = new Comment([ 'comment_id' => 1 ]);
        $comment->setId(2);
        $this->assertEquals( $comment->getId(), 2 );
    }
    public function testId_3(){
        $comment = new Comment([ 'comment_id' => 1 ]);
        $comment->setId(-2);
        $this->assertEquals( $comment->getId(), 1 );
    }
    public function testId_4(){
        $comment = new Comment([ 'comment_id' => -1 ]);
        $this->assertEquals( $comment->getId(), null );
    }
    public function testId_5(){
        $comment = new Comment([]);
        $this->assertEquals( $comment->getId(), null );
    }
    
    // user id's tests
    public function testUser_1(){
        $comment = new Comment([ 'user_id' => 1 ]);
        $this->assertEquals( $comment->getUser(), 1 );
    }
    public function testUser_2(){
        $comment = new Comment([ 'user_id' => 1 ]);
        $comment->setUser(2);
        $this->assertEquals( $comment->getUser(), 2 );
    }
    public function testUser_3(){
        $comment = new Comment([ 'user_id' => 1 ]);
        $comment->setUser(-2);
        $this->assertEquals( $comment->getUser(), 1 );
    }
    public function testUser_4(){
        $comment = new Comment([ 'user_id' => -1 ]);
        $this->assertEquals( $comment->getUser(), null );
    }
    public function testUser_5(){
        $comment = new Comment([]);
        $this->assertEquals( $comment->getUser(), null );
    }
    
    // user id's tests
    public function testDemand_1(){
        $comment = new Comment([ 'demand_id' => 1 ]);
        $this->assertEquals( $comment->getDemand(), 1 );
    }
    public function testDemand_2(){
        $comment = new Comment([ 'demand_id' => 1 ]);
        $comment->setDemand(2);
        $this->assertEquals( $comment->getDemand(), 2 );
    }
    public function testDemand_3(){
        $comment = new Comment([ 'demand_id' => 1 ]);
        $comment->setDemand(-2);
        $this->assertEquals( $comment->getDemand(), 1 );
    }
    public function testDemand_4(){
        $comment = new Comment([ 'demand_id' => -1 ]);
        $this->assertEquals( $comment->getDemand(), null );
    }
    public function testDemand_5(){
        $comment = new Comment([]);
        $this->assertEquals( $comment->getDemand(), null );
    }

    // name's tests
    public function testContent_1(){
        $comment = new Comment([ 'comment_content' => "hello" ]);
        $this->assertEquals( $comment->getContent(), "hello" );
    }
    public function testContent_2(){
        $comment = new Comment([ 'comment_content' => "hello" ]);
        $comment->setContent("hola");
        $this->assertEquals( $comment->getContent(), "hola" );
    }
    public function testContent_3(){
        $comment = new Comment([ 'comment_content' => "hello" ]);
        $comment->setContent(0);
        $this->assertEquals( $comment->getContent(), "hello" );
    }
    public function testContent_4(){
        $comment = new Comment([ 'comment_content' => 1 ]);
        $this->assertEquals( $comment->getContent(), null );
    }
    public function testContent_5(){
        $comment = new Comment([]);
        $this->assertEquals( $comment->getContent(), null );
    }

    // date's tests
    public function testDate_1(){
        $comment = new Comment([ 'comment_date' => "1970-01-01" ]);
        $this->assertEquals( $comment->getDate(), "1970-01-01" );
    }
    public function testDate_2(){
        $comment = new Comment([ 'comment_date' => "1970-01-01" ]);
        $comment->setDate("2000-01-01");
        $this->assertEquals( $comment->getDate(), "2000-01-01" );
    }
    public function testDate_3(){
        $comment = new Comment([ 'comment_date' => "1970-01-01" ]);
        $comment->setDate(19700101);
        $this->assertEquals( $comment->getDate(), "1970-01-01" );
    }
    public function testDate_4(){
        $comment = new Comment([ 'comment_date' => 19700101 ]);
        $this->assertEquals( $comment->getDate(), null );
    }
    public function testDate_5(){
        $comment = new Comment([]);
        $this->assertEquals( $comment->getDate(), null );
    }

}