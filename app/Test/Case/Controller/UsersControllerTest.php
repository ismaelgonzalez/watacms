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

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		//$this->markTestIncomplete('testIndex not implemented.');
		$result = $this->testAction('/users/index', array('return' => 'result'));
		debug($result);
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
		$Users = $this->generate('Users', array(
			'methods' => array('admin_add'),
			'models' => array(
				'User' => array('save')
			),
			'components' => array(
				//'RequestHandler' => array('isPut'),
				//'Email' => array('send'),
				'Session'
			)
		));

		$Users->Session
			->expects($this->once())
			->method('setFlash');
		/*$Users->response
			->expects($this->once())
			->method('header')
			->with('Location', '/admin/users/index');
*/
//		$this->controller = $Users;

		$user = array(
			'User' => array(
				'email' => "email@email.com",
				'password' => '12345678',
				'role' => 'editor',
				'status' => 1
			)
		);
		$add_user = $this->testAction('/admin/users/add', array('data' => $user, 'method' => 'post'));
		var_dump($add_user);
		//$this->assertEquals('/admin/users/index', $this->headers['Location']);
	}

/**
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {
		$this->markTestIncomplete('testAdminEdit not implemented.');
	}

/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete() {
		$this->markTestIncomplete('testAdminDelete not implemented.');
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
 */
	public function testBatchDelete() {
		$this->markTestIncomplete('testBatchDelete not implemented.');
	}

}
