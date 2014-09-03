<?php
App::uses('AppController', 'Controller');

class DashboardsController extends AppController {
	public $uses = array('user');

	public $scaffold = 'admin';

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('display');
	}

	public function isAuthorized($user) {
		return parent::isAuthorized($user);
	}

	public $helpers = array('Paginator', 'Js', 'Thumbs');

	public function index() {
		$this->layout = 'admin';
		$this->set('pageHeader', 'Dashboard');
		$this->set('sectionTitle', 'Ultimos Datos');
	}
}
