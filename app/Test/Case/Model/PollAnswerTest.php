<?php
App::uses('PollAnswer', 'Model');

/**
 * PollAnswer Test Case
 *
 */
class PollAnswerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.poll_answer',
		'app.poll'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PollAnswer = ClassRegistry::init('PollAnswer');
	}

	public function testCreate() {
		$this->markTestIncomplete('testAdminIndex not implemented.');
	}

	public function testFind() {
		$this->markTestIncomplete('testAdminIndex not implemented.');
	}

	public function testAddVotes() {
		$this->markTestIncomplete('testAdminIndex not implemented.');
	}
/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PollAnswer);

		parent::tearDown();
	}

}
