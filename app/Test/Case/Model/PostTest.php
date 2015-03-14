<?php
App::uses('Post', 'Model');

/**
 * Post Test Case
 *
 */
class PostTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.post',
		'app.section',
		'app.tagged'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Post = ClassRegistry::init('Post');
	}

	public function test_create() {

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
				'is_main' => 1,
				'is_top' => 1,
				'was_main' => 1,
				'num_views' => 1
			)
		);

		$this->assertNotNull($this->Post->save($post));
	}

	public function test_edit() {
		$post = array(
			'Post' => array(
				'id' => '1',
				'title' => 'modified title',
				'slug' => 'Lorem ipsum dolor sit amet',
				'blurb' => 'Lorem ipsum dolor sit amet',
				'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'pic' => '',
				'pic_blurb' => 'Lorem ipsum dolor sit amet',
				'section_id' => '1',
				'is_published' => '1',
				'published_date' => '2015-03-10',
				'published_time' => '17:19',
				'status' => '1',
				'is_main' => true,
				'is_top' => true,
				'was_main' => '1',
				'num_views' => '1'
			)
		);

		$modified_post = $this->Post->save($post);
		$this->assertNotNull($modified_post);

		unset($modified_post['Post']['published_time']);

		$this->Post->recursive = -1;
		$expected_post = $this->Post->findById(1);

		unset($expected_post['Post']['published_time']);

		$this->assertEquals($modified_post, $expected_post);
	}

	public function test_find() {
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
				'is_main' => 1,
				'is_top' => 1,
				'was_main' => 1,
				'num_views' => 1
			)
		);

		$new_post = $this->Post->save($post);
		$this->assertNotNull($new_post);

		$posts = $this->Post->find('all');

		$this->assertEquals(4, count($posts));
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Post);

		parent::tearDown();
	}

}
