<?php
App::import('Model', 'User');

class UserTest extends CakeTestCase {
	public $fixtures = array('app.user');

	public function test_first() {
		$this->assertEquals(1,1);
	}
}
