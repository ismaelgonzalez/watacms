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
				'id' => 3,
				'question' => 'Who is hotter JLaw or EmmaW?',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'published_date' => '2014-09-23',
				'published_time' => '18:47:10',
				'status' => 0
			),
		);

		$this->testAction('/admin/polls/add', array('data' => $$poll, 'method' => 'post'));

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
			'PollAnswer' => array(
				array(
					'poll_id' => 4,
					'answer' => 'Jlaw',
					'num_votes' => 0,
					'color' => 'Lorem ipsum dolor sit amet',
					'status' => 1
				),
				array(
					'poll_id' => 4,
					'answer' => 'EmmaW',
					'num_votes' => 0,
					'color' => 'Lorem ipsum dolor sit amet',
					'status' => 1
				)
			),
		);

		$this->testAction('/admin/polls/add', array('data' => $$poll, 'method' => 'post'));

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
				'question' => 'Who is hotter J Law or Emma W?',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'published_date' => '2014-09-23',
				'published_time' => '18:47:10',
				'status' => 1
			),
		);

		$result = $this->testAction('/admin/polls/edit/4', array('return' => 'vars', 'method' => 'post', 'data' => $poll));

		$this->assertEquals($poll['Poll']['question'], $result['poll']['Poll']['question']);
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

		$this->assertCount(1, $result['Poll']);
		$this->assertCount(2, $result['PollAnswer']);
	}

}
