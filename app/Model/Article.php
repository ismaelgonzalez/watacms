<?php
App::uses('AppModel', 'Model');
/**
 * Article Model
 *
 * @property Section $Section
 */
class Article extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

	public $actsAs = array('Taggable', 'Upload');

	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'El título es requerido',
				'required' => true,
			),
		),
		'section_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'La sección es requerida',
				'required' => true,
			),
		),
		'published_date' => array(
			'date' => array(
				'rule' => array('notEmpty'),
				'message' => 'Fecha de Publicación es requerida',
				'required' => true,
				'allowEmpty' => true,
			),
		),
		'published_time' => array(
			'time' => array(
				'rule' => array('notEmpty'),
				'message' => 'Tiempo de Publicación es requerido',
				'required' => true,
				'allowEmpty' => true,
			),
		),
	);

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

	public $hasMany = array(
		'Tagged' => array(
			'foreignKey' => 'model_id'
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

		if(!empty($this->data[$this->alias]['pic']['name'])){
			$pic_name = $this->uploadPic('articles', true);
			$this->data[$this->alias]['pic'] = $pic_name;
		}

		//check is_main/was_main

		return true;
	}
}
