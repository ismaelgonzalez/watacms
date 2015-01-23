<?php
/**
 * PhotoFixture
 *
 */
class PhotoFixture extends CakeTestFixture {

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
		'album_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'pic' => 'Lorem ipsum dolor sit amet',
			'title' => 'Lorem ipsum dolor sit amet',
			'blurb' => 'Lorem ipsum dolor sit amet',
			'album_id' => 1,
			'status' => 1
		),
		array(
			'id' => 2,
			'pic' => 'Lorem ipsum dolor sit amet',
			'title' => 'Lorem ipsum dolor sit amet',
			'blurb' => 'Lorem ipsum dolor sit amet',
			'album_id' => 1,
			'status' => 1
		),
		array(
			'id' => 3,
			'pic' => 'Lorem ipsum dolor sit amet',
			'title' => 'Lorem ipsum dolor sit amet',
			'blurb' => 'Lorem ipsum dolor sit amet',
			'album_id' => 1,
			'status' => 1
		),
		array(
			'id' => 4,
			'pic' => 'Lorem ipsum dolor sit amet',
			'title' => 'Lorem ipsum dolor sit amet',
			'blurb' => 'Lorem ipsum dolor sit amet',
			'album_id' => 2,
			'status' => 1
		),
	);

}
