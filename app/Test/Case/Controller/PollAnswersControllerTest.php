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
		debug($result);
		//$this->assertArrayHasKey('Pic', $result['pic']);
		//$this->assertEquals('New Title!!', $result['pic']['Pic']['title']);
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

}
