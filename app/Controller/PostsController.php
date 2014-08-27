<?php
App::uses('AppController', 'Controller');

class PostsController extends AppController
{
	public $uses = array('User');

	public $scaffold = 'admin';

	public $components = array(
		'Session',
		'Paginator',
	);

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}

	public function index() {
		$this->autoRender = false;
		echo __FILE__;
	}
}
