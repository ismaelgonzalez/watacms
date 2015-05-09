<?php
App::uses('AppController', 'Controller');

class VideosController extends AppController {
	public $uses = array('Video', 'Section', 'Tag', 'Tagged');
	public $helpers = array('Paginator', 'Js', 'Timeoptions');
	public $components = array('Paginator', 'Session');

	public $layout = 'admin';

	public function admin_index() {
		$this->set('title_for_layout', 'Administrar Videos');
		$this->set('pageHeader', 'Videos');
		$this->set('sectionTitle', 'Lista de Videos');

		$this->Video->recursive = 0;
		$this->Paginator->settings= array(
			'conditions' => array(
				'Video.status' => 1,
			),
			'order' => array(
				'Video.id' => 'DESC',
			),
		);
		$this->set('videos', $this->Paginator->paginate());
	}

	public function admin_add() {
		$this->set('title_for_layout', 'Administrar Videos');
		$this->set('pageHeader', 'Videos');
		$this->set('sectionTitle', 'Agregar');

		$conditions = array('Section.status' => 1);
		$sections = $this->Section->generateTreeList($conditions, null, null, ' - ', -1);
		$this->set('sections', $sections);

		if (!empty($this->data)) {
			$this->Video->create();

			if ($this->Video->save($this->request->data)) {
				$this->Session->setFlash('Se agreg&oacute; el nuevo Video!', 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'admin_index'));
			} else {
				$this->Session->setFlash('No se pudo guardar el Video :S', 'default', array('class'=>'alert alert-danger'));
			}
		}
	}

	public function admin_edit($id = null) {
		$this->set('title_for_layout', 'Administrar Videos');
		$this->set('pageHeader', 'Videos');
		$this->set('sectionTitle', 'Editar');

		$video = $this->Video->findById($id);
		if (empty($video)) {
			$this->Session->setFlash('No existe Video con este ID :(', 'default', array('class'=>'alert alert-danger'));

			return $this->redirect('/admin/videos/index');
		}

		$conditions = array('Section.status' => 1);
		$sections = $this->Section->generateTreeList($conditions, null, null, ' - ', -1);
		$this->set('sections', $sections);
		$this->set('video', $video);

		$tags = $this->Tagged->find('all', array(
			'conditions' => array(
				'model' => 'video',
				'model_id' => $id
			),
		));
		$this->set('tags', $tags);

		if (!empty($this->data)) {
			if (!$this->Video->save($this->data)) {
				$this->Session->setFlash('No se pudo guardar el Video  :S', 'default', array('class'=>'alert alert-danger'));

				return false;
			}

			$this->Session->setFlash('Se editó al Video!', 'default', array('class'=>'alert alert-success'));

			return $this->redirect('/admin/videos/index');
		}
	}

	public function admin_delete($id = null) {
		$this->autoRender = false;

		$video = $this->Video->find('first', array(
			'conditions' => array(
				'Video.id' => $id
			)
		));

		if ($video) {
			$video['Video']['status'] = 0;
			if ($this->Video->save($video) ) {
				$this->Session->setFlash('Se desactiv&oacute; al Video con exito!', 'default', array('class'=>'alert alert-success'));

				return $this->redirect('/admin/videos/index');
			} else {
				$this->Session->setFlash('No se borro el Video :(', 'default', array('class'=>'alert alert-danger'));

				return $this->redirect('/admin/videos/index');
			}

		} else {
			$this->Session->setFlash('No existe Video con este ID :(', 'default', array('class'=>'alert alert-danger'));

			return $this->redirect('/admin/videos/index');
		}
	}

	public function autocomplete() {
		$this->autoRender = false;
		$this->layout = "ajax";
		$term = $_GET['term'];
		$video = $this->Video->find('all', array(
			'recursive' => -1,
			'conditions' => array('Video.title LIKE' => $term.'%')
		));

		$term_return = array();

		foreach($video as $t){
			$term_return[] = array(
				'value' => $t['Video']['title'],
				'label' => $t['Video']['title'],
				'id' => $t['Video']['id']
			);
		}

		if ($this->request->is('ajax') ) {
			echo json_encode($term_return);
		} else {
			return json_encode($term_return);
		}
	}
}