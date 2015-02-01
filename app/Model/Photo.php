<?php
App::uses('AppModel', 'Model');
/**
 * Photo Model
 *
 * @property Album $Album
 */
class Photo extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

	public $actsAs = array('Upload');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'album_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'El Album es requerido',
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
		'Album' => array(
			'className' => 'Album',
			'foreignKey' => 'album_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function beforeSave($options = array()) {
		parent::beforeSave();

		$this->data[$this->alias]['status'] = isset($this->data[$this->alias]['status']) ? $this->data[$this->alias]['status'] : 1;

		if(!empty($this->data[$this->alias]['pic']['name'])){
			$pic_name = $this->uploadPic('photos', true);
			$this->data[$this->alias]['pic'] = $pic_name;
		}

		return true;
	}
}
