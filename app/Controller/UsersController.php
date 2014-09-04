<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController
{
	public $uses = array('User');

	public $scaffold = 'admin';

	public $components = array(
		'Session',
		'Auth' => array(
			'authorize' => array('Controller'),
			'authenticate' => array(
				'Form' => array(
					'fields' => array(
						'username' => 'email',
						'password' => 'password'
					),
					'scope' => array(
						'User.status' => 1,
					),
				),
			),
		),
		'Paginator',
	);

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'logout', 'admin_add');
	}

	public function isAuthorized($user) {
		return parent::isAuthorized($user);
	}

	public $helpers = array('Paginator', 'Js', 'Thumbs');

	public $layout = "admin";

	public $paginate = array(
		'conditions' => array(
			'User.status' => 1
		),
		'limit' => 10,
		'order' => array(
			'User.id'   => 'DESC'
		)
	);

	public function index(){
		//nothing
		return $this->redirect("/");
	}

	public function admin_index(){
		$this->set('title_for_layout', 'Administrar Editores');
		$this->set('pageHeader', 'Editores');
		$this->set('sectionTitle', 'Lista de Editores');

		$this->Paginator->settings= array(
			'conditions' => array(
				'User.status' => 1,
			),
			'order' => array(
				'User.id' => 'DESC',
			),
		);
		$users = $this->Paginator->paginate('User');

		$this->set('users', $users);
	}

	public function admin_add(){
		$this->set('title_for_layout', 'Administrar Editores');
		$this->set('pageHeader', 'Editores');
		$this->set('sectionTitle', 'Agregar');

		if (!empty($this->data)) {
			$this->User->create();

			if (!$this->User->saveAssociated($this->data)) {
				$this->Session->setFlash('No se pudo guardar al Editor  :S', 'default', array('class'=>'alert alert-danger'));

				return false;
			}

			$this->Session->setFlash('Se agreg&oacute; al nuevo Editor!', 'default', array('class'=>'alert alert-success'));

			return $this->redirect('/admin/users/index');
		}
	}

	public function admin_edit($id){
		$this->set('title_for_layout', 'Administrar Editores');
		$this->set('pageHeader', 'Editores');
		$this->set('sectionTitle', 'Editar');

		$user = $this->User->findById($id);
		if (empty($user)) {
			$this->Session->setFlash('No existe Editor con este ID :(', 'default', array('class'=>'alert alert-danger'));

			return $this->redirect('/admin/users/index');
		}

		$this->set('user', $user);

		if (!empty($this->data)) {
			if (empty($this->data['Author']['pic']['name'])) {
				unset($this->request->data['Author']['pic']);
			}
			if (empty($this->data['User']['password'])) {
				unset($this->request->data['User']['password']);
			}
			if (!$this->User->saveAssociated($this->data)) {
				$this->Session->setFlash('No se pudo guardar al Editor  :S', 'default', array('class'=>'alert alert-danger'));

				return false;
			}

			$this->Session->setFlash('Se editó al Editor!', 'default', array('class'=>'alert alert-success'));

			return $this->redirect('/admin/users/index');
		}
	}

	public function admin_delete($id){
		$this->autoRender = false;
		$user = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $id
			),
			'fields' => array(
				'User.id',
				'User.status'
			)
		));

		if ($user) {
			$user['User']['status'] = 0;
			$this->User->save($user);
			$this->Session->setFlash('Se desactiv&oacute; al Editor con exito!', 'default', array('class'=>'alert alert-success'));

			return $this->redirect('/admin/users/index');
		} else {
			$this->Session->setFlash('No existe Editor con este ID :(', 'default', array('class'=>'alert alert-danger'));

			return $this->redirect('/admin/users/index');
		}
	}

	public function login(){
		$this->layout = 'login';

		if($this->request->is('post')) {
			debug($this->data);

			if ($this->Auth->login()) {
				return $this->redirect('/admin/dashboard');
			}
			var_dump($this->Auth->User);
			$this->Session->setFlash(__('Email o passowrd incorrectos, por favor intente de nuevo.'), 'default', array('class' => 'alert alert-danger'));
		}

		$this->set('title_for_layout', 'Accesa a tu cuenta');
	}

	public function logout(){
		$this->autoRender = false;
		return $this->redirect($this->Auth->logout());
	}

	public function batch_delete($id_list) {
		$this->autoRender = false;
		$id_arr = explode("_", $id_list);

		foreach ($id_arr as $id) {
			if (!empty($id)) {
				$user = $this->User->find('first', array(
					'conditions' => array(
						'User.id' => $id
					),
					'fields' => array(
						'User.id',
						'User.status'
					),
					'recursive' => '1',
				));

				$user['User']['status'] = 0;
				$this->User->save($user);
			}
		}

		$this->Session->setFlash('Se desactivaron los Editores con exito!', 'default', array('class'=>'alert alert-success'));
		return $this->redirect('/users/');
	}

}
