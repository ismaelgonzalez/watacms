<?php
App::uses('AppController', 'Controller');

class PicsController extends AppController {
	public $uses = array('Pic', 'Section', 'Tag', 'Tagged');
	public $helpers = array('Paginator', 'Js', 'Thumbs', 'Timeoptions');
	public $components = array('Paginator', 'Session');

	public $layout = 'admin';

	public function admin_index() {
		$this->set('title_for_layout', 'Administrar Imagenes');
		$this->set('pageHeader', 'Imagenes');
		$this->set('sectionTitle', 'Lista de Imagenes');

		$this->Pic->recursive = 0;
		$this->Paginator->settings= array(
			'conditions' => array(
				'Pic.status' => 1,
			),
			'order' => array(
				'Pic.id' => 'DESC',
			),
		);
		$this->set('pics', $this->Paginator->paginate());
	}

	public function admin_add() {
		$this->set('title_for_layout', 'Administrar Imagenes');
		$this->set('pageHeader', 'Imagenes');
		$this->set('sectionTitle', 'Agregar');

		$conditions = array('Section.status' => 1);
		$sections = $this->Section->generateTreeList($conditions, null, null, ' - ', -1);
		$this->set('sections', $sections);

		if (!empty($this->data)) {
			$this->Pic->create();

			if (empty($this->data['Pic']['pic']['name'])) {
				unset($this->request->data['Pic']['pic']);
			}

			if ($this->Pic->save($this->request->data)) {
				$this->Session->setFlash('Se agreg&oacute; la nueva Imagen!', 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'admin_index'));
			} else {
				$this->Session->setFlash('No se pudo guardar la Imagen :S', 'default', array('class'=>'alert alert-danger'));
			}
		}
	}

	public function admin_edit($id = null) {
		$this->set('title_for_layout', 'Administrar Imagenes');
		$this->set('pageHeader', 'Imagenes');
		$this->set('sectionTitle', 'Editar');

		$pic = $this->Pic->findById($id);
		if (empty($pic)) {
			$this->Session->setFlash('No existe Imagen con este ID :(', 'default', array('class'=>'alert alert-danger'));

			return $this->redirect('/admin/pics/index');
		}

		$conditions = array('Section.status' => 1);
		$sections = $this->Section->generateTreeList($conditions, null, null, ' - ', -1);
		$this->set('sections', $sections);
		$this->set('pic', $pic);

		$tags = $this->Tagged->find('all', array(
			'conditions' => array(
				'model' => 'pic',
				'model_id' => $id
			),
		));
		$this->set('tags', $tags);

		if (!empty($this->data)) {
			if (empty($this->data['Pic']['pic']['name'])) {
				unset($this->request->data['Pic']['pic']);
			}

			if (!$this->Pic->save($this->data)) {
				$this->Session->setFlash('No se pudo guardar al Imagen  :S', 'default', array('class'=>'alert alert-danger'));

				return false;
			}

			$this->Session->setFlash('Se editó al Imagen!', 'default', array('class'=>'alert alert-success'));

			return $this->redirect('/admin/pics/index');
		}
	}

	public function admin_delete($id = null) {
		$this->autoRender = false;

		$pic = $this->Pic->find('first', array(
			'conditions' => array(
				'Pic.id' => $id
			),
			'fields' => array(
				'Pic.id',
				'Pic.published_date',
				'Pic.published_time',
				'Pic.section_id',
				'Pic.status',
			)
		));

		if ($pic) {
			$pic['Pic']['status'] = 0;
			if ($this->Pic->save($pic) ) {
				$this->Session->setFlash('Se desactiv&oacute; al Imagen con exito!', 'default', array('class'=>'alert alert-success'));

				return $this->redirect('/admin/pics/index');
			} else {
				$this->Session->setFlash('No se borro el Imagen :(', 'default', array('class'=>'alert alert-danger'));

				return $this->redirect('/admin/pics/index');
			}

		} else {
			$this->Session->setFlash('No existe Imagen con este ID :(', 'default', array('class'=>'alert alert-danger'));

			return $this->redirect('/admin/pics/index');
		}
	}

	public function autocomplete() {
		$this->autoRender = false;
		$this->layout = "ajax";
		$term = $_GET['term'];
		$pics = $this->Pic->find('all', array(
			'recursive' => -1,
			'conditions' => array('Pic.title LIKE' => $term.'%')
		));

		$term_return = array();

		foreach($pics as $t){
			$term_return[] = array(
				'value' => $t['Pic']['title'],
				'label' => $t['Pic']['title'],
				'id' => $t['Pic']['id']
			);
		}

		if ($this->request->is('ajax') ) {
			echo json_encode($term_return);
		} else {
			return json_encode($term_return);
		}
	}
}