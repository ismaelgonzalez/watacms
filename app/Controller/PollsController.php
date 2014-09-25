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
		$this->Poll->recursive = 0;
		$this->Paginator->settings= array(
			'order' => array(
				'Poll.id' => 'DESC',
			),
			'conditions' => array(
				'Poll.status' => 1,
			),
		);
		$this->set('polls', $this->Paginator->paginate());

		$this->set('title_for_layout', 'Administrar Encuestas');
		$this->set('pageHeader', 'Encuestas');
		$this->set('sectionTitle', 'Lista de Encuestas');
	}

	public function admin_add() {

	}

	public function admin_edit($id = null) {

	}

	public function admin_delete($id = null) {

	}
}
