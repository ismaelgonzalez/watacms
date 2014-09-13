<?php
App::uses('Tag', 'Model');

/**
 * Tag Test Case
 *
 */
class TagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tag',
		'app.tagged'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tag = ClassRegistry::init('Tag');
	}

	public function testAddTag() {
		$tag = array(
			'Tag' => array(
				'tag' => 'Life'
			),
		);

		$new_tag = $this->Tag->save($tag);

		$this->assertArrayHasKey('Tag', $new_tag);
		$this->assertEquals(4, $new_tag['Tag']['id']);
		$this->assertEquals('Life', $new_tag['Tag']['tag']);

	}

	public function testDeleteTag() {
		$this->Tag->delete(1);

		$tags = $this->Tag->find('all');

		$this->assertCount(2, $tags);
	}
/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tag);

		parent::tearDown();
	}

}
