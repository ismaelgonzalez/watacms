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

	public function admin_delete($id = null) {
		$this->autoRender = false;

		$poll_answer = $this->PollAnswer->findById($id);

		if (!empty($poll_answer)) {
			$poll_answer['PollAnswer']['status'] = 0;
			if ( $this->PollAnswer->save($poll_answer) ) {
				echo 'ok';
			} else {
				echo 'error';
			}
		} else {
			echo 'error';
		}
	}

	public function addVote($poll_id, $id) {
		$this->autoRender = false;

		$this->PollAnswer->recursive = -1;
		$poll_answer = $this->PollAnswer->findByPollIdAndIdAndStatus($poll_id, $id, 1);

		if (!empty($poll_answer)) {
			$poll_answer['PollAnswer']['num_votes']++;
			if ( $this->PollAnswer->save($poll_answer) ) {
				echo 'ok';
			} else {
				echo 'error';
			}
		} else {
			echo 'error';
		}
	}
}