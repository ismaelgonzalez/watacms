<?php
App::uses('VideosController', 'Controller');

/**
 * VideosController Test Case
 *
 */
class VideosControllerTest extends ControllerTestCase {

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
		$result = $this->testAction('/admin/videos/index', array('return' => 'vars'));

		$this->assertCount(3, $result['videos']);
	}

/**
 * testAdminAdd method
 *
 * @return void
 */
	public function testAdminAdd() {
		$video = array(
			'Video' => array(
				'video' => 'https://www.youtube.com/watch?v=HE46n2Rs9Jo',
				'title' => 'Title 4',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'section_id' => 1,
				'is_published' => 0,
				'published_date' => '2014-09-13',
				'published_time' => '14:41:50',
				'status' => 1),
		);

		$this->_testAction('/admin/videos/add', array('return' => 'vars', 'data' => $video, 'method' => 'post'));

		$result = $this->testAction('/admin/videos/index', array('return' => 'vars'));

		$this->assertCount(4, $result['videos']);
	}

/**
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {
		$video = array(
			'Video' => array(
				'id' => '1',
				'video' => 'https://www.youtube.com/watch?v=HE46n2Rs9Jo',
				'video_number' => 'HE46n2Rs9Jo',
				'title' => 'Title New',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'section_id' => '1',
				'is_published' => '0',
				'published_date' => '2014-09-13',
				'published_time' => '14:41:00',
				'status' => '1'),
		);

		$this->_testAction('/admin/videos/edit/1', array('return' => 'vars', 'data' => $video, 'method' => 'post'));

		$result = $this->testAction('/admin/videos/edit/1/', array('return' => 'vars', 'method' => 'get'));

		$this->assertEquals($video['Video'], $result['video']['Video']);
	}

/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete() {
		$this->_testAction('/admin/videos/delete/1', array('return' => 'vars', 'method' => 'post'));

		$result = $this->testAction('/admin/videos/index', array('return' => 'vars'));

		$this->assertCount(2, $result['videos']);
	}

	public function testAutocomplete() {
		$term = array('term' => 'lin');
		$result = $this->_testAction('/videos/autocomplete/', array('method' => 'get', 'data' => $term));
		$tags = json_decode($result);

		$this->assertCount(3, $tags);
		$this->assertObjectHasAttribute('value', $tags[0]);
		$this->assertObjectHasAttribute('label', $tags[0]);
		$this->assertObjectHasAttribute('id', $tags[0]);
	}

}
