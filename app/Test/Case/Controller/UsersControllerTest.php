<?php
App::uses('UsersController', 'Controller');

/**
 * UsersController Test Case
 *
 */
class UsersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.author'
	);

	public function setUp()
	{
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		//$this->markTestIncomplete('testIndex not implemented.');
		$result = $this->testAction('/users/index', array('return' => 'result'));
		$this->assertNull($result);
	}

/**
 * testAdminIndex method
 *
 * @return void
 */
	public function testAdminIndex() {
		//we only list active records
		$user = array(
			'User' => array(
				'email' => "email@email.com",
				'password' => '12345678',
				'role' => 'editor',
				'status' => 0
			)
		);
		$this->testAction('/admin/users/add', array('data' => $user, 'method' => 'post'));

		$result = $this->testAction('/admin/users/index', array('return' => 'vars'));
		$this->assertCount(3, $result['users']);
	}

/**
 * testAdminAdd method
 *
 * @return void
 */
	public function testAdminAdd() {
		$user = array(
			'User' => array(
				'email' => "email@email.com",
				'password' => '12345678',
				'role' => 'editor',
				'status' => 1
			)
		);
		$this->testAction('/admin/users/add', array('data' => $user, 'method' => 'post'));

		$result = $this->testAction('/admin/users/index', array('return' => 'vars'));
		$this->assertCount(4, $result['users']);
	}

/**
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {
		$user = array(
			'User' => array(
				'id' => 1,
				'email' => "bigguy@4u.com",
				'password' => '12345678',
				'role' => 'editor',
				'status' => 1
			)
		);
		$this->testAction('/admin/users/edit/1', array('data' => $user, 'method' => 'post'));

		$result = $this->testAction('/admin/users/edit/1', array('return' => 'vars', 'method' => 'get'));

		$this->assertEquals('bigguy@4u.com', $result['user']['User']['email']);
	}

/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete() {
		$this->testAction('/admin/users/delete/1', array('method' => 'post'));

		$result = $this->testAction('/admin/users/index', array('return' => 'vars'));
		$this->assertCount(2, $result['users']);
	}

/**
 * testLogin method
 *
 * @return void
 */
	public function testLogin() {
		$this->markTestIncomplete('testLogin not implemented.');
	}

/**
 * testLogout method
 *
 * @return void
 */
	public function testLogout() {
		$this->markTestIncomplete('testLogout not implemented.');
	}

/**
 * testBatchDelete method
 *
 * @return void
 *
	public function testBatchDelete() {
		$this->markTestIncomplete('testBatchDelete not implemented.');
	}
*/
}
