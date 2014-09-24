<?php
/**
 * PollAnswerFixture
 *
 */
class PollAnswerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'poll_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'answer' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'num_votes' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'color' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'poll_id' => 2,
			'answer' => 'Jerry',
			'num_votes' => 1,
			'color' => 'Lorem ipsum dolor sit amet',
			'status' => 1
		),
		array(
			'id' => 2,
			'poll_id' => 2,
			'answer' => 'George',
			'num_votes' => 1,
			'color' => 'Lorem ipsum dolor sit amet',
			'status' => 1
		),
		array(
			'id' => 3,
			'poll_id' => 2,
			'answer' => 'Kramer',
			'num_votes' => 1,
			'color' => 'Lorem ipsum dolor sit amet',
			'status' => 1
		),
		array(
			'id' => 4,
			'poll_id' => 3,
			'answer' => 'Superman',
			'num_votes' => 1,
			'color' => 'Lorem ipsum dolor sit amet',
			'status' => 1
		),
		array(
			'id' => 5,
			'poll_id' => 3,
			'answer' => 'Batman',
			'num_votes' => 1,
			'color' => 'Lorem ipsum dolor sit amet',
			'status' => 1
		),
	);

}
