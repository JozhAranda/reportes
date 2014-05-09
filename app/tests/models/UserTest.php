<?php

use Way\Tests\Factory;

class UserTest extends TestCase {

    

    public function testUserInsertIsSuccess() {
        

        $user = Factory::User();

        $user->email = 'jesus.solis@morzan.com';
        $user->password = Hash::make('123456');
        $user->status = 1;
        $user->permission_id = rand(2, 3);
        #printf($validator->messages());
        $this->assertTrue($user->save());        
    }

    public function testUserDidNotPassValidation() {
        $password = Hash::make('123455');

        $validator = Validator::make(
                        array('email' => 'jesus.solis@morzan.com', 'password' => $password, 'status' => 1, 'permission_id' => 2), User::$rules);

        $this->assertTrue($validator->fails());
    }

}
