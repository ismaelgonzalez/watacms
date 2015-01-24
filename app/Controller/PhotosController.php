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
		return $this->redirect('/admin/');
	}
	public function admin_add() {}
	public function admin_edit() {}
	public function admin_delete() {}
}