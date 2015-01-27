<?php
App::uses('AppModel', 'Model');
/**
 * Album Model
 *
 * @property Section $Section
 * @property Photo $Photo
 */
class Album extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

	public $actsAs = array('Taggable');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'El Titulo del Album es requerido.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
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
		'Section' => array(
			'className' => 'Section',
			'foreignKey' => 'section_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Photo' => array(
			'className' => 'Photo',
			'foreignKey' => 'album_id',
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

	public function beforeSave($options = array()) {
		parent::beforeSave();

		$this->data[$this->alias]['status'] = isset($this->data[$this->alias]['status']) ? $this->data[$this->alias]['status'] : 1;

		//saving the start and end dates
		if (!empty($this->data[$this->alias]['published_date'])) {
			$this->data[$this->alias]['published_date'] = date("Y-m-d", strtotime($this->data[$this->alias]['published_date']));
		}

		if (!isset($this->data[$this->alias]['time_is_set'])) {
			if ($this->data[$this->alias]['published_time'] == 0) {
				$this->data[$this->alias]['published_time'] = date("H:i");
			} else {
				if (strstr($this->data[$this->alias]['published_time'], ':')) {
					$this->data[$this->alias]['published_time'] = date("H:i", strtotime($this->data[$this->alias]['published_time']));
				} else {
					$this->data[$this->alias]['published_time'] = date("H:i", strtotime($this->data[$this->alias]['published_time'] . ':00'));
				}
			}
		} else {
			unset($this->data[$this->alias]['published_time']);
		}

		return true;
	}
}
