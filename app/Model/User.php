<?php
//App::uses('AuthComponen', 'Controller/Component');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	public $name = 'User';
	public $useTable = 'users';
	//public $actsAs = array('Upload', 'Containable');

	public $validate = array(
		'email' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'El email es requerido',
			),
			'email' => array(
				'rule' => 'email',
				'message' => 'Necesita ser un email valido!'
			),
		),
		'password' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'La password es requerida',
			),
			'minLength' => array(
				'rule' => array('minLength', 8),
				'message' => 'La password ocupa mínimo 8 caracteres.',
			),
		),
		'role' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'El Rol es requerido',
			),
			'allowedChoice' => array(
				'rule'    => array('inList', array('admin', 'editor')),
				'message' => 'El Valor de Rol tiene que ser Admin o Editor.'
			)
		),
	);

	public $hasOne = array(
		'Author'
	);

	public function beforeSave($options = array()) {
		parent::beforeSave();

		$this->data[$this->alias]['status'] = isset($this->data[$this->alias]['status']) ? $this->data[$this->alias]['status'] : 1;

		if( !empty($this->data[$this->alias]['password']) ) {
			$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
		}

		return true;
	}
}