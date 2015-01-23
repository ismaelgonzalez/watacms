<?php
App::uses('Photo', 'Model');

/**
 * Photo Test Case
 *
 */
class PhotoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.photo',
		'app.album',
		'app.section'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Photo = ClassRegistry::init('Photo');
	}

	public function test_Create() {
		$photo = array(
			'Photo' => array(
				'pic' => 'pic4.jpg',
				'title' => 'Lorem ipsum dolor sit amet',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'album_id' => 1,
				'status' => 1
			)
		);

		$this->Photo->save($photo);

		$photos = $this->Photo->find('all');
		$this->assertCount(5, $photos);
	}

	public function test_Edit() {
		$photo = array(
			'Photo' => array(
				'id' => 1,
				'pic' => 'Lorem ipsum dolor sit amet',
				'title' => 'New Pic 1',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'album_id' => 1,
				'status' => 1
			)
		);

		$this->Photo->save($photo);

		$modified_photo = $this->Photo->findById(1);

		$this->assertEquals($photo['Photo']['title'], $modified_photo['Photo']['title']);
		$this->assertEquals($photo['Photo']['album_id'], $modified_photo['Photo']['album_id']);
	}

	public function test_Find() {
		$photo = $this->Photo->findById(1);

		$this->assertEquals('Lorem ipsum dolor sit amet', $photo['Photo']['title']);
		$this->assertEquals('1', $photo['Photo']['album_id']);
	}
	
/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Photo);

		parent::tearDown();
	}

}
