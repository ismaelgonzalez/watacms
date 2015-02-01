<?php
App::uses('AlbumsController', 'Controller');

/**
 * AlbumsController Test Case
 *
 */
class AlbumsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.album',
		'app.section',
		'app.photo',
		'app.tag',
		'app.tagged'
	);

/**
 * testAdminIndex method
 *
 * @return void
 */
	public function testAdminIndex() {
		$result = $this->testAction('/admin/albums/index', array('return' => 'vars'));

		$this->assertCount(3, $result['albums']);
	}

/**
 * testAdminAdd method
 *
 * @return void
 */
	public function testAdminAdd() {
		$album = array(
			'Album' => array(
				'title' => 'Album 4',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'section_id' => 2,
				'is_published' => 1,
				'published_date' => '2015-01-21',
				'published_time' => '18:31:38',
				'status' => 1
			)
		);

		$this->testAction('/admin/albums/add', array('return' => 'vars', 'data' => $album, 'method' => 'post'));

		$result = $this->testAction('/admin/albums/index', array('return' => 'vars'));
		$this->assertCount(4, $result['albums']);
	}

/**
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {
		$album = array(
			'Album' => array(
				'id' => '1',
				'title' => 'Edit Album 1',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'section_id' => '2',
				'is_published' => '1',
				'published_date' => '2015-01-21',
				'published_time' => '18:31:00',
				'status' => '1'
			)
		);

		$this->testAction('/admin/albums/edit/1', array('return' => 'vars', 'data' => $album, 'method' => 'post'));

		$result = $this->testAction('/admin/albums/edit/1/', array('return' => 'vars', 'method' => 'get'));

		$this->assertEquals($album['Album'], $result['album']['Album']);
	}

/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete() {
		$this->testAction('/admin/albums/delete/1', array('return' => 'vars', 'method' => 'post'));

		$result = $this->testAction('/admin/albums/index', array('return' => 'vars', 'method' => 'get'));
		$this->assertCount(2, $result['albums']);
	}

/**
 * testAdminView method
 *
 * @return void
 */
	public function testAdminView() {
		$result = $this->testAction('/admin/albums/view/2', array('return' => 'vars', 'method' => 'post'));

		$this->assertCount(1, $result['album']['Photo']);
	}

}
