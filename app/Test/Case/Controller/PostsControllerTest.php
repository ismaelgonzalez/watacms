<?php
App::uses('PostsController', 'Controller');

/**
 * PostsController Test Case
 *
 */
class PostsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.post',
		'app.section',
		'app.tagged',
		'app.tag'
	);

/**
 * testAdminIndex method
 *
 * @return void
 */
	public function testAdminIndex() {
		$result = $this->testAction('/admin/posts/index', array('return' => 'vars'));

		$this->assertCount(3, $result['posts']);
	}

/**
 * testAdminAdd method
 *
 * @return void
 *
	public function testAdminAdd() {
		$post = array(
			'Post' => array(
			'title' => 'Post number 4',
			'slug' => 'Lorem ipsum dolor sit amet',
			'blurb' => 'Lorem ipsum dolor sit amet',
			'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'pic' => '',
			'pic_blurb' => 'Lorem ipsum dolor sit amet',
			'section_id' => 1,
			'is_published' => 1,
			'published_date' => '2015-03-10',
			'published_time' => '17:19:54',
			'status' => 1,
			'is_main' => 0,
			'is_top' => 0,
			'was_main' => 0,
			'num_views' => 0
		));

		$this->testAction('/admin/posts/add', array('return' => 'vars', 'data' => $post, 'method' => 'post'));

		$result = $this->testAction('/admin/posts/index', array('return' => 'vars'));
		$this->assertCount(4, $result['posts']);
	}*/

/**
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {
		$post = array(
			'Post' => array(
				'id' => '2',
				'title' => 'edit title 2',
				'slug' => '',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'pic' => '',
				'pic_blurb' => 'Lorem ipsum dolor sit amet',
				'section_id' => '1',
				'is_published' => '1',
				'published_date' => '2015-03-10',
				'published_time' => '17:19:00',
				'status' => '1',
				'is_main' => '0',
				'is_top' => '0',
				'was_main' => '0',
				'num_views' => '0'
			));

		$this->testAction('/admin/posts/edit/2', array('return' => 'vars', 'data' => $post, 'method' => 'post'));

		$result = $this->testAction('/admin/posts/edit/2', array('return' => 'vars', 'method' => 'get'));

		$this->assertEquals($post['Post']['title'], $result['post']['Post']['title']);
		$this->assertEquals($post['Post']['slug'], $result['post']['Post']['slug']);
	}

/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete() {
		$this->testAction('/admin/posts/delete/2', array('return' => 'vars', 'method' => 'post'));

		$result = $this->testAction('/admin/posts/index', array('return' => 'vars', 'method' => 'get'));

		$this->assertEquals(2, count($result['posts']));
	}

}
