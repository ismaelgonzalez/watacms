<?php
App::uses('PicsController', 'Controller');

/**
 * PicsController Test Case
 *
 */
class PicsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pic',
		'app.section',
		'app.tagged'
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
		$pic = array(
			'Pic' => array(
				'pic' => 'image4.jpg',
				'title' => 'Title 4',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'section_id' => 1,
				'is_published' => 0,
				'published_date' => '2014-09-13',
				'published_time' => '14:41:50',
				'status' => 0),
		);

		$this->testAction('/admin/pics/add', array('data' => $pic, 'method' => 'post'));

		$result = $this->testAction('/admin/pics/index', array('return' => 'vars'));

		$this->assertCount(3, $result['pics']);
	}

/**
 * testAdminAdd method
 *
 * @return void
 */
	public function testAdminAdd() {
		$pic = array(
			'Pic' => array(
				'pic' => 'image4.jpg',
				'title' => 'Title 4',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'section_id' => 1,
				'is_published' => 0,
				'published_date' => '2014-09-13',
				'published_time' => '14:41:50',
				'status' => 1),
		);

		$this->testAction('/admin/pics/add', array('data' => $pic, 'method' => 'post'));
		$results = $this->headers['Location'];
		$expected = 'http://localhost' . ROOT . DS . 'app/Console/admin/pics';
		$this->assertEquals($expected, $results);

		$result = $this->testAction('/admin/pics/index', array('return' => 'vars'));
		$this->assertCount(4, $result['pics']);

		$result = $this->testAction('/admin/pics/edit/4', array('return' => 'vars', 'method' => 'get'));
		$this->assertArrayHasKey('Pic', $result['pic']);
		$this->assertArrayHasKey('title', $result['pic']['Pic']);
		$this->assertArrayHasKey('section_id', $result['pic']['Pic']);
	}

/**
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {
		$pic = array(
			'Pic' => array(
				'id' => 1,
				'title' => 'New Title!!',
				'section_id' => 1,
				'published_date' => '2014-09-13',
				'published_time' => '14:41:50',
				'status' => 1),
		);

		$this->testAction('/admin/pics/add', array('data' => $pic, 'method' => 'post'));

		$result = $this->testAction('/admin/pics/edit/1', array('return' => 'vars', 'method' => 'get'));
		$this->assertArrayHasKey('Pic', $result['pic']);
		$this->assertEquals('New Title!!', $result['pic']['Pic']['title']);
	}

/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete() {
		$this->testAction('/admin/pics/delete/1', array('method' => 'post'));

		$result = $this->testAction('/admin/pics/index', array('return' => 'vars'));

		$this->assertCount(2, $result['pics']);
	}

}
