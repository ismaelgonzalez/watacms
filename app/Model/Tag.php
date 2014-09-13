<?php
App::uses('AppModel', 'Model');
/**
 * Tag Model
 *
 * @property Tagged $Tagged
 */
class Tag extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'tag';


/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Tagged' => array(
			'className' => 'Tagged',
			'foreignKey' => 'tag_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
