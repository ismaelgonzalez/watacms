<?php
App::uses('Article', 'Model');

/**
 * Article Test Case
 *
 */
class ArticleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.article',
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
		$this->Article = ClassRegistry::init('Article');
	}

	public function test_create() {

		$article = array(
			'Article' => array(
				'title' => 'Article number 4',
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

		$this->assertNotNull($this->Article->save($article));
	}

	public function test_edit() {
		$article = array(
			'Article' => array(
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

		$modified_article = $this->Article->save($article);
		$this->assertNotNull($modified_article);

		unset($modified_article['Article']['published_time']);

		$this->Article->recursive = -1;
		$expected_article = $this->Article->findById(1);

		unset($expected_article['Article']['published_time']);

		$this->assertEquals($modified_article, $expected_article);
	}

	public function test_find() {
		$article = array(
			'Article' => array(
				'title' => 'Article number 4',
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

		$new_article = $this->Article->save($article);
		$this->assertNotNull($new_article);

		$articles = $this->Article->find('all');

		$this->assertEquals(4, count($articles));
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Article);

		parent::tearDown();
	}

}
