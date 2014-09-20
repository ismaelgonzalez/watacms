<?php
App::uses('TagsController', 'Controller');

/**
 * TagsController Test Case
 *
 */
class TagsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tag',
		'app.tagged'
	);

	public function setUp()
	{
		parent::setUp();
		$this->Tag = ClassRegistry::init('Tag');
		$this->Tagged = ClassRegistry::init('Tagged');
	}

/**
 * testAdminIndex method
 *
 * @return void
 */
	public function testAdminIndex() {
		$result = $this->testAction('/admin/tags/index', array('return' => 'vars'));
		$this->assertCount(3, $result['tags']);
	}

/**
 * testAdminAdd method
 *
 * @return void
 */
	public function testAdminAdd() {
		$tag = array(
			'Tag' => array(
				'tag' => 'Life'
			),
		);

		$this->testAction('/admin/tags/add', array('data' => $tag, 'method' => 'post'));
		$results = $this->headers['Location'];
		$expected = 'http://localhost' . ROOT . DS . 'app/Console/admin/tags';
		$this->assertEquals($expected, $results);

		$result = $this->testAction('/admin/tags/index', array('return' => 'vars'));
		$this->assertCount(4, $result['tags']);

		$result = $this->testAction('/admin/tags/edit/4', array('return' => 'vars', 'method' => 'get'));

		$this->assertCount(1, $result['tag']);
		$this->assertArrayHasKey('Tag', $result['tag']);
		$this->assertArrayHasKey('tag', $result['tag']['Tag']);
		$this->assertArrayNotHasKey('Tagged', $result['tag']);
	}

/**
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {
		$tag['Tag']['id']  = 1;
		$tag['Tag']['tag'] = 'Zoom';

		$this->testAction('/admin/tags/edit/1', array('return' => 'vars', 'data' =>$tag, 'method' => 'post'));

		$result = $this->testAction('/admin/tags/edit/1', array('return' => 'vars', 'method' => 'get'));
		$this->assertCount(1, $result['tag']);
		$this->assertEquals('Zoom', $result['tag']['Tag']['tag']);
	}

/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete() {
		$deleted = $this->_testAction('/admin/tags/delete/1', array('method' => 'post'));

		$result = $this->testAction('/admin/tags/index', array('return' => 'vars'));
		$this->assertCount(2, $result['tags']);

	}

	public function testAutocomplete() {
		$result = $this->_testAction('/tags/autocomplete/f', array('method' => 'get'));
		$tags = json_decode($result);

		$this->assertCount(2, $tags);
		$this->assertObjectHasAttribute('value', $tags[0]);
		$this->assertObjectHasAttribute('label', $tags[0]);
		$this->assertObjectHasAttribute('id', $tags[0]);
	}

	public function testGetModelByTag() {

	}
}
