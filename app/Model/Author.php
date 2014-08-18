<?php
/**
 * Created by PhpStorm.
 * User: ismael
 * Date: 8/16/14
 * Time: 6:24 PM
 */

class Author extends AppModel {
	public $name = 'Author';
	public $useTable = 'authors';
	public $actsAs = array('Upload');

	public $validate = array(
		'name' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'El nombre es requerido',
			),
		),
		'last_name' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'El apellido es requerido',
			),
		),
	);

	public $hasOne = array(
		'User'
	);

	public function beforeSave($options = array()) {
		parent::beforeSave();

		if(!empty($this->data[$this->alias]['pic']['name'])){
			$pic_name = $this->uploadPic('users');
			$this->data[$this->alias]['pic'] = $pic_name;
		}

		return true;
	}
} 