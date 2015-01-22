<?php
App::uses('AppController', 'Controller');
/**
 * Photos Controller
 *
 */
class PhotosController extends AppController {
	public $uses = array('Album', 'Photo');
	public $helpers = array('Paginator', 'Js', 'Thumbs');
	public $components = array('Paginator', 'Session');

	public $layout = 'admin';

	public function admin_index() {
		$this->autoRender = false;
		echo __CLASS__ . ' ' . __FUNCTION__;
	}
	public function admin_add() {}
	public function admin_edit() {}
	public function admin_delete() {}
	public function admin_view() {}
}