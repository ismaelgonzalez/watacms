<?php
App::uses('Tagged', 'Model');

/**
 * Tagged Test Case
 *
 */
class TaggedTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tagged',
		'app.tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tagged = ClassRegistry::init('Tagged');
	}

	public function testRemoveAll() {
		$this->Tagged->deleteAll(array(
			'Tagged.tag_id' => 2
		));

		$tagged = $this->Tagged->find('all');

		$this->assertCount(1, $tagged);
	}

	public function testAddTags() {
		$tagged = array(
			'Tagged' => array(
				'tag_id' => 3,
				'model' => 'video',
				'model_id' => 3
			),
		);

		$new_tagged = $this->Tagged->save($tagged);
		$this->assertArrayHasKey('Tagged', $new_tagged);
		$this->assertEquals(4, $new_tagged['Tagged']['id']);
		$this->assertEquals(3, $new_tagged['Tagged']['tag_id']);
		$this->assertEquals(3, $new_tagged['Tagged']['model_id']);
		$this->assertEquals('video', $new_tagged['Tagged']['model']);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tagged);

		parent::tearDown();
	}

}
