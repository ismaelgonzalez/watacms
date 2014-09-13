<?php
/**
 * TaggedFixture
 *
 */
class TaggedFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'tagged';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'tag_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'model_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'model' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'tag_id' => 1,
			'model_id' => 1,
			'model' => 'post'
		),
		array(
			'id' => 2,
			'tag_id' => 2,
			'model_id' => 1,
			'model' => 'post'
		),
		array(
			'id' => 3,
			'tag_id' => 2,
			'model_id' => 2,
			'model' => 'post'
		),
	);

}
