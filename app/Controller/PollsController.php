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
		$this->set('title_for_layout', 'Administrar Encuestas');
		$this->set('pageHeader', 'Encuestas');
		$this->set('sectionTitle', 'Agregar');

		if ($this->request->is('post')) {
			debug($this->request->data);
			exit();
			/*$this->Poll->create();
			if ($this->Poll->saveAssociated($this->request->data)) {
				$this->Poll->setFlash('Se agreg&oacute; la nueva Encuesta!', 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('No se pudo guardar la Encuesta :S', 'default', array('class'=>'alert alert-danger'));
			}
			*/
		}
	}

	public function admin_edit($id = null) {

	}

	public function admin_delete($id = null) {

	}
}
