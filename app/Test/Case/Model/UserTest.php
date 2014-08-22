<?php
App::import('Model', 'User');

class UserTest extends CakeTestCase {
	public $fixtures = array('app.user', 'app.author');

	public function setUp()
	{
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

	public function testGetInstance()
	{
		$role = $this->User->field('role', array('User.email' => 'ismael@gmail.com'));

		$this->assertEquals($role, 'admin', 'admin');

		$users = $this->User->find('all');
		$this->assertEquals(3, sizeof($users));

		$this->assertArrayHasKey('User', $users[0]);
		$this->assertArrayHasKey('Author', $users[0]);
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}
}
