<?php
App::uses('AppModel', 'Model');
/**
 * Section Model
 *
 */
class Section extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	public $actsAs = array('Tree');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'El nombre de la sección es requerida',
				'required' => true,
			),
		),
	);
}
