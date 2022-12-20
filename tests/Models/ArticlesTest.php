<?php
use PHPUnit\Framework\TestCase;
use App\Models\Articles;




/**
 * ArticlesTest Model
 */
final class ArticlesTest extends TestCase {

 
    /** @test */
    public function getAllTest():void {
        $filter="data";
        $result = Articles::getAll($filter);
        //fwrite(STDOUT, print_r($result, TRUE));
      
        $this->assertGreaterThan(1, count($result));
        $keys = array_keys($result[0]);
        $this->assertSame(["id", "name", "description", "published_date", "user_id", "views", "picture"], $keys);

       
       
    }

    /**
     * ?
     * @access public
     * @return string|boolean
     * @throws Exception
     */
    /** @test */
    public function getOneTest() {
        $result = Articles::getOne(1);
        $this->assertSame(1, count([$result]));
        
       $keys = array_keys($result[0]);
        $this->assertSame(["id", "name", "description", "published_date", "user_id", "views", "picture", "username", "email"], $keys);

       
    }

   
    public static function addOneView() {
        //Articles::addOneView();
    }

     /** @test */
    public function getByUserTest() {
        $result = Articles::getByUser(1);
        $keys = array_keys($result[0]);
        $this->assertSame(["id", "name", "description", "published_date", "user_id", "views", "picture", "username", "email", "password", "salt", "is_admin"], $keys);

    }

     /** @test */
    public function getSuggestTest() {
        $result = Articles::getSuggest();
        $this->assertGreaterThan(0, count($result));
        $result = $result[0];
        $keys = array_keys($result);
        $this->assertSame(["id", "name", "description", "published_date", "user_id", "views", "picture", "username", "email", "password", "salt", "is_admin"], $keys);
    }



    
    public static function saveTest($data) {
        //Articles::save();
    }

    public static function attachPicture($articleId, $pictureName){
        //Articles::attachPicture();
    }




}
