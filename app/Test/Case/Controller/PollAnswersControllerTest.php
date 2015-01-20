<?php
App::uses('PollAnswersController', 'Controller');

/**
 * PollAnswersController Test Case
 *
 */
class PollAnswersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.poll',
		'app.poll_answer'
	);

	public function setUp()
	{
		parent::setUp();
		$this->PollAnswer = ClassRegistry::init('PollAnswer');
	}

/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete()
	{
		$this->testAction('/admin/poll_answers/delete/5', array('return' => 'vars', 'method' => 'post'));

		$this->PollAnswer->recursive = -1;
		$pa = $this->PollAnswer->findByPollId(3);
		$this->assertCount(1, $pa);
	}

	/**
	 * testAdminAddVote method
	 *
	 * @return void
	 */
	public function testAdminAddVote() {
		$this->_testAction('/poll/vote/2/2', array('return' => 'vars', 'method' => 'post'));

		$poll_answer = $this->PollAnswer->findByPollIdAndId(2,2);
		$this->assertEquals(2, $poll_answer['PollAnswer']['num_votes']);
	}
}
