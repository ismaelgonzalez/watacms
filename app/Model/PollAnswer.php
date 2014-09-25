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

	/*
	 * This function adds a vote to a poll answer
	 * @params array $poll_answer record
	 * @returns nothing
	 */
	public function addVote($poll_answer) {
		$poll_answer['PollAnswer']['num_votes']++;
		$this->save($poll_answer);

		return $poll_answer['PollAnswer']['num_votes'];
	}
}
