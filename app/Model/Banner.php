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
		'pic' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'La imagen del banner es requerida',
				'required' => true,
			),
		'link' => array(
				'url' => array(
					'rule' => array('url'),
					'message' => 'El Link tiene que ser un url válido',
					'required' => false,
				),
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

		if(!empty($this->data[$this->alias]['pic']['name'])){
			$pic_name = $this->uploadPic('banners');
			$this->data[$this->alias]['pic'] = $pic_name;
		}

		return true;
	}
}
