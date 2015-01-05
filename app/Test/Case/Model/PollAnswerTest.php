<?php
App::uses('Poll', 'Model');
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
		$this->Poll       = ClassRegistry::init('Poll');
	}

	public function testCreate() {
		$poll_answer = array(
			'poll_id' => 1,
			'answer' => 'Lorem Ipsum',
			'color' => 'Lorem ipsum dolor sit amet',
			'num_votes' => 0,
			'status' => 1
		);

		$this->PollAnswer->save($poll_answer);

		$poll_answers = $this->PollAnswer->find('all');

		$this->assertCount(6, $poll_answers);
	}

	public function testFind() {
		$poll_answer = $this->PollAnswer->findById(2);

		$this->assertCount(2, $poll_answer);
		$this->assertArrayHasKey('Poll', $poll_answer);
		$this->assertArrayHasKey('PollAnswer', $poll_answer);
		$this->assertEquals('George', $poll_answer['PollAnswer']['answer']);

	}

	public function testAddVotes() {
		$this->PollAnswer->recursive = -1;
		$poll_answer = $this->PollAnswer->findById(1);
		$num_votes = $poll_answer['PollAnswer']['num_votes'];
		$this->assertEquals(1, $num_votes);

		$pollAnswer = new PollAnswer();
		$poll_answer = $pollAnswer->addVote($poll_answer);
		$this->assertEquals(2, $poll_answer);
	}

	public function testDelete() {
		$this->PollAnswer->delete(1);

		$poll_answers = $this->PollAnswer->find('all');

		$this->assertCount(4, $poll_answers);
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
