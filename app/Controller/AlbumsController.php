<?php
App::uses('AppController', 'Controller');
/**
 * Albums Controller
 *
 */
class AlbumsController extends AppController {
	public $uses = array('Album', 'Photo', 'Section', 'Tag', 'Tagged');
	public $helpers = array('Paginator', 'Js', 'Thumbs', 'Timeoptions');
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
