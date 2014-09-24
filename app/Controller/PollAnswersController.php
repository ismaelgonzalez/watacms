<?php
App::uses('AppController', 'Controller');
/**
 * PollAnswers Controller
 *
 * @property PollAnswer $PollAnswer
 * @property PaginatorComponent $Paginator
 */
class PollAnswersController extends AppController {
	public $uses       = array('Poll', 'PollAnswer');

	public $helpers    = array('Paginator', 'Js');

	public $components = array('Paginator', 'Session');

	public $layout     = 'admin';

	public function admin_index() {

	}

	public function admin_edit($id = null) {

	}

	public function admin_delete($id = null) {

	}
}