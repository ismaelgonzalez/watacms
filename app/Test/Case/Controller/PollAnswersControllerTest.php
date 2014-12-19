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
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {
		$poll_answer = array(
			'PollAnswer' => array(
				'id' => 5,
				'poll_id' => 3,
				'answer' => 'Green Lantern',
				'num_votes' => 5,
				'color' => 'Lorem ipsum dolor sit amet',
				'status' => 1
			),
		);

		$result = $this->testAction('/admin/poll_answers/edit/5', array('return' => 'vars', 'method' => 'post', 'data' => $poll_answer));

		$pa = $this->PollAnswer->findById(5);
		$this->assertEquals('Green Lantern', $pa['PollAnswer']['answer']);
	}

/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete()
	{
		$result = $this->testAction('/admin/poll_answers/delete/5', array('return' => 'vars', 'method' => 'post'));

		$this->PollAnswer->recursive = -1;
		$pa = $this->PollAnswer->findByPollId(3);
		$this->assertCount(1, $pa);
	}

}
