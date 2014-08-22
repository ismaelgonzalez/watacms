<?php
App::uses('Author', 'Model');

/**
 * Author Test Case
 *
 */
class AuthorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.author',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Author = ClassRegistry::init('Author');
	}

	public function testGetInstance()
	{
		$author_name = $this->Author->field('name', array('Author.user_id' => '1'));

		$this->assertEquals('Lorem', $author_name);

		$authors = $this->Author->find('all', array('recursive' => -1));
		$this->assertEquals(3, sizeof($authors));

		$this->assertArrayHasKey('last_name', $authors[0]['Author']);
		$this->assertArrayHasKey('bio', $authors[0]['Author']);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Author);

		parent::tearDown();
	}

}
