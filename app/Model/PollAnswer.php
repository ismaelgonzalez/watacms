<?php
App::uses('AppModel', 'Model');
/**
 * PollAnswer Model
 *
 * @property Poll $Poll
 */
class PollAnswer extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'answer';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'poll_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'La pregunta es requerida!',
			),
		),
		'answer' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'La respuesta es campo requerido',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Poll' => array(
			'className' => 'Poll',
			'foreignKey' => 'poll_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
