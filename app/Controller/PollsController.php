<?php
App::uses('AppController', 'Controller');
/**
 * Polls Controller
 *
 * @property Poll $Poll
 * @property PaginatorComponent $Paginator
 */
class PollsController extends AppController {
	public $uses       = array('Poll', 'PollAnswer');

	public $helpers    = array('Paginator', 'Js');

	public $components = array('Paginator', 'Session');

	public $layout     = 'admin';

	public function admin_index() {

	}

	public function admin_add() {

	}

	public function admin_edit($id = null) {

	}

	public function admin_delete($id = null) {

	}
}
