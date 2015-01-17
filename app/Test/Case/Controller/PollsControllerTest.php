<?php
App::uses('PollsController', 'Controller');

/**
 * PollsController Test Case
 *
 */
class PollsControllerTest extends ControllerTestCase {

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
		$this->Poll = ClassRegistry::init('Poll');
		$this->PollAnswer = ClassRegistry::init('PollAnswer');
	}

/**
 * testAdminIndex method
 *
 * @return void
 */
	public function testAdminIndex() {
		$poll = array(
			'Poll' => array(
				'question' => 'Who is hotter JLaw or EmmaW?',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'published_date' => '2014-09-23',
				'published_time' => '18:47:10',
				'status' => 0
			),
			'answer' => array(
				0 => 'JLaw',
				1 => 'Emma',
			),
			'answerColor' => array(
				0 => 'blue',
				1 => 'red',
			),
		);

		$this->testAction('/admin/polls/add', array('data' => $poll, 'method' => 'post'));

		$result = $this->testAction('/admin/polls/index', array('return' => 'vars'));

		$this->assertCount(3, $result['polls']);
	}

/**
 * testAdminAdd method
 *
 * @return void
 */
	public function testAdminAdd() {
		$poll = array(
			'Poll' => array(
				'question' => 'Who is hotter JLaw or EmmaW?',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'published_date' => '2014-09-23',
				'published_time' => '18:47:10',
				'status' => 1
			),
			'answer' => array(
				0 => 'JLaw',
				1 => 'Emma',
			),
			'answerColor' => array(
				0 => 'blue',
				1 => 'red',
			),
		);

		$this->testAction('/admin/polls/add', array('data' => $poll, 'method' => 'post'));
		$result = $this->testAction('/admin/polls/edit/4', array('return' => 'vars', 'method' => 'get'));

		$this->assertCount(2, $result['poll']);
		$this->assertCount(2, $result['poll']['PollAnswer']);
	}

/**
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {
		$poll = array(
			'Poll' => array(
				'id' => 3,
				'question' => 'Who is hotter J Law or Emma W?',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'published_date' => '2014-09-23',
				'published_time' => '18:47:10',
				'status' => 1
			),
			'answerId' => array(
				0 => 1,
				1 => 2
			),
			'answer' => array(
				0 => 'JLawrence',
				1 => 'EmmaW',
			),
			'answerColor' => array(
				0 => 'blue',
				1 => 'red',
			),
			'answerNumVotes' => array(
				0 => 25,
				1 => 27
			),
		);

		$this->testAction('/admin/polls/edit/3', array('return' => 'vars', 'method' => 'post', 'data' => $poll));
		$result = $this->Poll->findById(3);

		$this->assertEquals($poll['Poll']['question'], $result['Poll']['question']);
	}

/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete() {
		$this->testAction('/admin/polls/delete/1', array('return' => 'vars', 'method' => 'post'));

		$result = $this->testAction('/admin/polls/index', array('return' => 'vars'));

		$this->assertCount(2, $result['polls']);
	}

	/**
	 * testShow method
	 *
	 * @return void
	 */
	public function testShow() {
		$result = $this->_testAction('/polls/show/3', array('return' => 'vars'));

		$this->assertCount(6, $result['poll']['Poll']);
		$this->assertCount(2, $result['poll']['PollAnswer']);
	}

}
