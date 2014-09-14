<?php
App::uses('AppModel', 'Model');
/**
 * Banner Model
 *
 * @property BannerSize $BannerSize
 */
class Banner extends AppModel {
	public $actsAs = array('Upload');
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'El nombre es requerido',
				'required' => true,
			),
		),
		'link' => array(
			'url' => array(
				'rule' => array('url'),
				'message' => 'El Link tiene que ser un url válido',
				'required' => false,
				'allowEmpty' => true
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
		'BannerSize' => array(
			'className' => 'BannerSize',
			'foreignKey' => 'banner_size_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function beforeSave($options = array()) {
		parent::beforeSave();

		$this->data[$this->alias]['status'] = isset($this->data[$this->alias]['status']) ? $this->data[$this->alias]['status'] : 1;

		//saving the start and end dates
		if (!empty($this->data[$this->alias]['start_date'])) {
			$this->data[$this->alias]['start_date'] = date("Y-m-d", strtotime($this->data[$this->alias]['start_date']));
		}
		if (!empty($this->data[$this->alias]['end_date'])) {
			$this->data[$this->alias]['end_date'] = date("Y-m-d", strtotime($this->data[$this->alias]['end_date']));
		}


		if(!empty($this->data[$this->alias]['pic']['name'])){
			$pic_name = $this->uploadPic('banners', true);
			$this->data[$this->alias]['pic'] = $pic_name;
		}

		return true;
	}
}
