<?php
App::uses('Poll', 'Model');

/**
 * Poll Test Case
 *
 */
class PollTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.poll',
		'app.poll_answer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Poll = ClassRegistry::init('Poll');
	}

	public function testCreate() {
		$this->markTestIncomplete('testAdminIndex not implemented.');
	}

	public function testFind() {
		$this->markTestIncomplete('testAdminIndex not implemented.');
	}

	public function testGetResults() {
		$this->markTestIncomplete('testAdminIndex not implemented.');
	}
/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Poll);

		parent::tearDown();
	}

}
