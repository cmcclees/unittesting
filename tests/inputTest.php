<?php
/**
 * Created by PhpStorm.
 * User: cmcclees
 * Date: 3/4/14
 * Time: 6:43 PM
 */
require_once __DIR__ . '/../classes/Input.php';

class inputTest extends PHPUnit_Framework_TestCase {

   public function test_get_with_value() {
       //arrange
       $_GET['email'] = 'dtang@usc.edu';

       //act
       $result = Input::get('email');

       //assert
       $this->assertEquals('dtang@usc.edu', $result);
   }

    public function test_get_no_value() {
        //arrange

        //act
        $email = Input::get('email');
        $plan = Input::get('plan');

        //assert
        $this->assertNull($email);
        $this->assertEquals('plan, standard', $plan);
    }

    public function tearDown() {
        unset($_GET['email']);
    }

} 