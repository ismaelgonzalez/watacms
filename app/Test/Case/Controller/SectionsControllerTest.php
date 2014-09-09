<?php
App::uses('SectionsController', 'Controller');

/**
 * SectionsController Test Case
 *
 */
class SectionsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.section'
	);

	public function setUp()
	{
		parent::setUp();
		$this->Section = ClassRegistry::init('Section');
	}
/**
 * testAdminIndex method
 *
 * @return void
 */
	public function testAdminIndex() {
		$section['Section']['parent_id'] = 0;
		$section['Section']['name']      = 'Section 4';

		$this->testAction('/admin/sections/add', array('data' => $section, 'method' => 'post'));

		$result = $this->testAction('/admin/sections/index', array('return' => 'vars'));
		$this->assertCount(4, $result['sections']);
	}

/**
 * testAdminAdd method
 *
 * @return void
 */
	public function testAdminAdd() {
		$section['Section']['parent_id'] = 0;
		$section['Section']['name']      = 'Section 4';

		$this->testAction('/admin/sections/add', array('data' => $section, 'method' => 'post'));
		$results = $this->headers['Location'];
		$expected = 'http://localhost' . ROOT . DS . 'app/Console/admin/sections';
		$this->assertEquals($expected, $results);

		$result = $this->testAction('/admin/sections/index', array('return' => 'vars'));
		$this->assertCount(4, $result['sections']);

		$result = $this->testAction('/admin/sections/edit/4', array('return' => 'vars', 'method' => 'get'));

		$this->assertCount(1, $result['section']);
		$this->assertArrayHasKey('Section', $result['section']);
		$this->assertArrayHasKey('name', $result['section']['Section']);
		$this->assertArrayHasKey('parent_id', $result['section']['Section']);
	}

/**
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {
		$section['Section']['id']        = 1;
		$section['Section']['parent_id'] = 0;
		$section['Section']['name']      = 'Section 1';

		$this->testAction('/admin/sections/add', array('data' => $section, 'method' => 'post'));

		$result = $this->testAction('/admin/sections/edit/1', array('return' => 'vars', 'method' => 'get'));
		$this->assertCount(1, $result['section']);
		$this->assertEquals('Section 1', $result['section']['Section']['name']);
	}

/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete() {
		$this->testAction('/admin/sections/delete/1', array('method' => 'post'));

		$result = $this->testAction('/admin/sections/index', array('return' => 'vars'));
		$this->assertCount(2, $result['sections']);
	}

	public function testAdminDeleteParentWithChildren() {
		$this->testAction('/admin/sections/delete/2', array('method' => 'post'));

		$result = $this->testAction('/admin/sections/index', array('return' => 'vars'));
		$this->assertCount(1, $result['sections']);
	}

	public function testGetNameById() {
		$result = $this->testAction('/sections/getNameById/1');
		$expected = 'Lorem ipsum dolor sit amet';

		$this->assertEquals($expected, $result);
	}
}
