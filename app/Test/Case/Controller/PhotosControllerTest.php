<?php
App::uses('PhotosController', 'Controller');

/**
 * PhotosController Test Case
 *
 */
class PhotosControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.album',
		'app.section',
		'app.photo'
	);

/**
 * testAdminIndex method
 *
 * @return void
 */
	public function testAdminIndex() {
		$result = $this->testAction('/admin/photos/index', array('return' => 'vars'));

		$this->assertEmpty($result);
	}

/**
 * testAdminAdd method
 *
 * @return void
 *
	public function testAdminAdd() {
		$album_id = 2;
		$photo = array(
				'Photo' => array(
				'pic' => '',	//'new_pic.jpg',
				'title' => 'New Pic',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'album_id' => $album_id,
				'status' => 1
		));

		$this->testAction('/admin/photos/add', array('return' => 'vars', 'data' => $photo, 'method' => 'post'));

		$result = $this->testAction('/admin/photos/view/' . $album_id, array('return' => 'vars', 'method' => 'get'));
		$this->markTestSkipped('The MySQLi extension is not available.');
		//$this->assertCount(4, $result['photos']);
	}*/

/**
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {
		$album_id = 1;
		$photo = array(
			'Photo' => array(
				'id' => '1',
				//'pic' => 'new_pic.jpg',
				'title' => 'New Pic',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'album_id' => "$album_id",
				'status' => '1'
			));

		$this->testAction('/admin/photos/edit/1', array('return' => 'vars', 'data' => $photo, 'method' => 'post'));

		$result = $this->testAction('/admin/photos/edit/1/', array('return' => 'vars', 'method' => 'get'));

		$this->assertCount(6, $result['photo']['Photo']);
		unset($result['photo']['Photo']['pic']);
		$this->assertEquals($photo['Photo'], $result['photo']['Photo']);
	}

/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete() {
		$this->testAction('/admin/photos/delete/1', array('return' => 'vars', 'method' => 'post'));

		$result = $this->testAction('/admin/photos/view/1/', array('return' => 'vars', 'method' => 'get'));

		$this->assertCount(2, $result['album']['Photo']);
	}
}
