<?php
/**
 * SectionFixture
 *
 */
class SectionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
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
			'parent_id' => 0,
			'name' => 'Lorem ipsum dolor sit amet',
			'lft' => 1,
			'rght' => 1,
			'status' => 1,
		),
		array(
			'id' => 2,
			'parent_id' => 0,
			'name' => 'Municipios',
			'lft' => 1,
			'rght' => 1,
			'status' => 1,
		),
		array(
			'id' => 3,
			'parent_id' => 2,
			'name' => 'Hermosillo',
			'lft' => 1,
			'rght' => 1,
			'status' => 1,
		),
	);

}
