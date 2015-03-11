<?php
App::uses('Article', 'Model');

/**
 * Article Test Case
 *
 */
class ArticleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.article',
		'app.section'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Article = ClassRegistry::init('Article');
	}

	public function test_create() {
		$this->markTestIncomplete('test_create not implemented.');
	}

	public function test_edit() {
		$this->markTestIncomplete('test_edit not implemented.');
	}

	public function test_find() {
		$this->markTestIncomplete('test_find not implemented.');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Article);

		parent::tearDown();
	}

}
