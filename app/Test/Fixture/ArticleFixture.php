<?php
/**
 * ArticleFixture
 *
 */
class ArticleFixture extends CakeTestFixture {
	public $useDbConfig = 'test';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'slug' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 128, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'blurb' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'body' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pic' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 128, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pic_blurb' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'section_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'is_published' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 4, 'unsigned' => false),
		'published_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'published_time' => array('type' => 'time', 'null' => true, 'default' => null),
		'status' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 4, 'unsigned' => false),
		'is_main' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'is_top' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'was_main' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => false),
		'num_views' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'slug' => 'Lorem ipsum dolor sit amet',
			'blurb' => 'Lorem ipsum dolor sit amet',
			'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'pic' => 'Lorem ipsum dolor sit amet',
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
		),
		array(
			'id' => 2,
			'title' => 'Lorem ipsum dolor sit amet',
			'slug' => 'Lorem ipsum dolor sit amet',
			'blurb' => 'Lorem ipsum dolor sit amet',
			'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'pic' => 'Lorem ipsum dolor sit amet',
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
		),
		array(
			'id' => 3,
			'title' => 'Lorem ipsum dolor sit amet',
			'slug' => 'Lorem ipsum dolor sit amet',
			'blurb' => 'Lorem ipsum dolor sit amet',
			'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'pic' => 'Lorem ipsum dolor sit amet',
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
		),
	);

}
