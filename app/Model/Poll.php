<?php
App::uses('AppModel', 'Model');
/**
 * Poll Model
 *
 * @property PollAnswer $PollAnswer
 */
class Poll extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'question';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'question' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'La pregunta es campo requerido.',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'PollAnswer' => array(
			'className' => 'PollAnswer',
			'foreignKey' => 'poll_id',
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
