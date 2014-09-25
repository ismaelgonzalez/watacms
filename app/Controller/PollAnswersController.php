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


	public function admin_edit($poll_id = null) {
		$this->autoRender = false;
		//find this poll
		//if it exists
			//set poll answers
			//if post
				//save
				//return to /admin/polls/
		//else send error message



		/*if (!$this->PollAnswer->exists($id)) {
			throw new NotFoundException(__('Invalid section'));
		}

		if ($this->request->is(array('post', 'put'))) {
			if (!$this->PollAnswer->save($this->request->data)) {

				$this->Session->setFlash('No se pudo guardar la Respuesta de la Encuesta :S', 'default', array('class'=>'alert alert-danger'));
				return $this->redirect('/admin/polls/');
			}
		}*/
	}

	public function admin_delete($id = null) {
		//find this pollAnswer
		//if it exists
			//update status to 0
			//save
			//return /admin/polls/
		//else, send error message
	}
}