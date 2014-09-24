<?php
/**
 * PollFixture
 *
 */
class PollFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'question' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'blurb' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'question' => 'Lorem ipsum dolor sit amet?',
			'blurb' => 'Lorem ipsum dolor sit amet',
			'published_date' => '2014-09-23',
			'published_time' => '18:47:10',
			'status' => 1
		),
		array(
			'id' => 2,
			'question' => 'Best Seinfeld character?',
			'blurb' => 'Lorem ipsum dolor sit amet',
			'published_date' => '2014-09-23',
			'published_time' => '18:47:10',
			'status' => 1
		),
		array(
			'id' => 3,
			'question' => 'Who is better Batman or Superman?',
			'blurb' => 'Lorem ipsum dolor sit amet',
			'published_date' => '2014-09-23',
			'published_time' => '18:47:10',
			'status' => 1
		),
	);

}
