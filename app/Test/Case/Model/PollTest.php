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
		$poll = array(
			'question' => 'Best Girl?',
			'blurb' => 'Lorem ipsum dolor sit amet',
			'published_date' => '2014-09-23',
			'published_time' => '18:47:10',
			'status' => 1
		);

		$this->Poll->save($poll);

		$polls = $this->Poll->find('all');
		$this->assertCount(4, $polls);
	}

	public function testFind() {
		$poll = $this->Poll->findById(2);

		$this->assertArrayHasKey('Poll', $poll);
		$this->assertArrayHasKey('PollAnswer', $poll);
		$this->assertEquals('Best Seinfeld character?', $poll['Poll']['question']);
	}

	public function testGetResults() {
		$poll = $this->Poll->findById(2);

		$this->assertArrayHasKey('Poll', $poll);
		$this->assertArrayHasKey('PollAnswer', $poll);
		$this->assertCount(3, $poll['PollAnswer']);
		$result = round(($poll['PollAnswer'][0]['num_votes']/3)*100);
		$this->assertEquals(33, $result);
	}

	public function testDelete() {
		$this->Poll->delete(1);

		$polls = $this->Poll->find('all');

		$this->assertCount(2, $polls);
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
