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

	public function beforeFilter() {
		parent::beforeFilter();

		$this->Auth->allow('show');
	}

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
			$this->Poll->create();

			foreach ($this->request->data['answer'] as $key => $value) {
				$color = !empty( $this->request->data['answerColor'][$key] ) ? $this->request->data['answerColor'][$key] : "primary" ;

				$this->request->data['PollAnswer'][] = array(
					'answer' => $value,
					'color'  => $color
				);
			}

			if ($this->Poll->saveAssociated($this->request->data)) {
				$this->Session->setFlash('Se agreg&oacute; la nueva Encuesta!', 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('No se pudo guardar la Encuesta :S', 'default', array('class'=>'alert alert-danger'));
			}
		}
	}

	public function admin_edit($id = null) {
		$this->set('title_for_layout', 'Administrar Encuestas');
		$this->set('pageHeader', 'Encuestas');
		$this->set('sectionTitle', 'Editar');

		//search for poll by id
		//if poll exists
			//if is post
				//save, show message and redirect to index
		// if not show message redirect to index

		$poll = $this->Poll->findById($id);

		if ( !empty($poll) ) {
			if ($this->request->is('post')) {
				foreach ($this->request->data['answerId'] as $key => $value) {
					$this->request->data['PollAnswer'][] = array(
						'id' => $value,
						'answer' => $this->request->data['answer'][$key],
						'color' => $this->request->data['answerColor'][$key],
						'num_votes' => $this->request->data['answerNumVotes'][$key]
					);
				}

				if ($this->Poll->saveAssociated($this->request->data)) {
					$this->Session->setFlash('Se agreg&oacute; la nueva Encuesta!', 'default', array('class' => 'alert alert-success'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('No se pudo guardar la Encuesta :S', 'default', array('class' => 'alert alert-danger'));
				}
			}
		} else {
			$this->Session->setFlash('No existe encuesta con este ID :(', 'default', array('class'=>'alert alert-danger'));

			return $this->redirect('/admin/polls/index');
		}

		$this->set('poll', $poll);

	}

	public function admin_delete($id = null) {

	}

	public function show($id) {

	}
}
