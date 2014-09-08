<?php
App::uses('Section', 'Model');

/**
 * Section Test Case
 *
 */
class SectionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.section'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Section = ClassRegistry::init('Section');
	}

	public function test_addSection() {
		$section['Section']['parent_id'] = 0;
		$section['Section']['name']      = 'Section 4';

		$this->Section->save($section);

		$sections = $this->Section->find('all');

		$this->assertCount(4, $sections);
	}

	public function test_getChildren() {
		$section['Section']['parent_id'] = 2;
		$section['Section']['name']      = 'Section 4';

		$this->Section->save($section);

		$children = $this->Section->children(2, true);

		$this->assertCount(2, $children);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Section);

		parent::tearDown();
	}

}
