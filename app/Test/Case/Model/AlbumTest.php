<?php
App::uses('Album', 'Model');

/**
 * Album Test Case
 *
 */
class AlbumTest extends CakeTestCase {

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
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Album = ClassRegistry::init('Album');
	}

	public function test_Create() {
		$album = array(
			'Album' => array(
				'title' => 'Album 4',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'section_id' => 1,
				'is_published' => 0,
				'published_date' => '2015-01-21',
				'published_time' => '18:31:38',
				'status' => 1
			)
		);

		$this->Album->save($album);

		$albums = $this->Album->find('all');
		$this->assertCount(4, $albums);
	}

	public function test_Edit() {
		$album = array(
			'Album' => array(
				'id' => 1,
				'title' => 'Album 4',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'section_id' => 1,
				'is_published' => 0,
				'published_date' => '2015-01-21',
				'published_time' => '18:31:38',
				'status' => 1
			)
		);

		$this->Album->save($album);

		$modified_album = $this->Album->findById(1);

		$this->assertEquals($album['Album']['title'], $modified_album['Album']['title']);
		$this->assertEquals($album['Album']['section_id'], $modified_album['Album']['section_id']);
	}

	public function test_Find() {
		$album = $this->Album->findById(1);

		$this->assertEquals('Album 1', $album['Album']['title']);
		$this->assertEquals('1', $album['Album']['section_id']);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Album);

		parent::tearDown();
	}

}
