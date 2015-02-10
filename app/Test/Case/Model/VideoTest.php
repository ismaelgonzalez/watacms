<?php
App::uses('Video', 'Model');

/**
 * Video Test Case
 *
 */
class VideoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.video',
		'app.section',
		'app.tagged',
		'app.tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Video = ClassRegistry::init('Video');
	}

	public function testCreate() {
		$video = array(
			'Video' => array(
				'video' => '',
				'title' => 'Title 4',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'section_id' => 1,
				'is_published' => 0,
				'published_date' => '2014-09-13',
				'published_time' => '14:41:50',
				'status' => 1),
		);

		$this->Video->save($video);

		$videos = $this->Video->find('all');
		$this->assertCount(4, $videos);
	}

	public function testEdit() {
		$video = array(
			'Video' => array(
				'id' => 1,
				'title' => 'New Title',
				'section_id' => 3,
				'video' => '',
				'published_date' => '2014-09-13',
				'published_time' => '14:41:50',
			),
		);

		$this->Video->save($video);

		$modified_video = $this->Video->findById(1);

		$this->assertEquals($video['Video']['title'], $modified_video['Video']['title']);
		$this->assertEquals($video['Video']['section_id'], $modified_video['Video']['section_id']);
	}

	public function testFind() {
		$video = $this->Video->findById(1);

		$this->assertEquals('Link 1', $video['Video']['title']);
		$this->assertEquals('1', $video['Video']['section_id']);
		$this->assertEquals('link1', $video['Video']['video']);
	}
/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Video);

		parent::tearDown();
	}

}
