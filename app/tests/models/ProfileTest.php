<?php

use Way\Tests\Factory;

/**
 * Description of ProfileTest
 *
 * @author jesus
 */
class ProfileTest extends TestCase {
    use Way\Tests\ModelHelpers;
    
    public function testInsertingUserProfile(){
        $user=User::find(1);
        $profile =  Factory::profile();        
        $profile->name='bla';
        $profile->lastname='blass';
        $profile->user_id=1;
        $this->assertTrue($profile->save());
    }
    
    public function testBelogsToUser(){
        $this->assertBelongsTo('User','Profile');
    }
    
}
