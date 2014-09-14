<?php
/**
 * PicFixture
 *
 */
class PicFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'pics';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'pic' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 128, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'title' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'blurb' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'section_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'is_published' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 4, 'unsigned' => false),
		'published_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'published_time' => array('type' => 'time', 'null' => true, 'default' => null),
		'status' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 4, 'unsigned' => false),
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
			'pic' => 'image1.jpg',
			'title' => 'Title 1',
			'blurb' => 'Lorem ipsum dolor sit amet',
			'section_id' => 1,
			'is_published' => 1,
			'published_date' => '2014-09-13',
			'published_time' => '14:41:50',
			'status' => 1
		),
		array(
			'id' => 2,
			'pic' => 'image2.jpg',
			'title' => 'Title 2',
			'blurb' => 'Lorem ipsum dolor sit amet',
			'section_id' => 2,
			'is_published' => 1,
			'published_date' => '2014-09-13',
			'published_time' => '14:41:50',
			'status' => 1
		),
		array(
			'id' => 3,
			'pic' => 'image3.jpg',
			'title' => 'Title 3',
			'blurb' => 'Lorem ipsum dolor sit amet',
			'section_id' => 3,
			'is_published' => 1,
			'published_date' => '2014-09-13',
			'published_time' => '14:41:50',
			'status' => 1
		),
	);
}
