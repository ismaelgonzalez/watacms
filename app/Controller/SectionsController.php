<?php
App::uses('AppController', 'Controller');
/**
 * Sections Controller
 *
 * @property Section $Section
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SectionsController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Paginator', 'Js');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	public $layout = 'admin';

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Section->recursive = 0;
		$this->Paginator->settings= array(
			'order' => array(
				'Section.id' => 'DESC',
			),
		);
		$this->set('sections', $this->Paginator->paginate());

		$this->set('title_for_layout', 'Administrar Secciones');
		$this->set('pageHeader', 'Secciones');
		$this->set('sectionTitle', 'Lista de Secciones');
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->set('title_for_layout', 'Administrar Secciones');
		$this->set('pageHeader', 'Secciones');
		$this->set('sectionTitle', 'Agregar');

		$sections = $this->Section->find('list', array(
			'fields' => array('id', 'name'),
			'conditions' => array('parent_id' => null),
			'order' => array('lft ASC')
		));

		$this->set('sections', $sections);

		if ($this->request->is('post')) {
			$this->Section->create();
			if ($this->Section->save($this->request->data)) {
				$this->Session->setFlash('Se agreg&oacute; la nueva Sección!', 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('No se pudo guardar la Sección :S', 'default', array('class'=>'alert alert-danger'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Section->exists($id)) {
			throw new NotFoundException(__('Invalid section'));
		}

		$this->set('title_for_layout', 'Administrar Secciones');
		$this->set('pageHeader', 'Secciones');
		$this->set('sectionTitle', 'Editar');

		$sections = $this->Section->find('list', array(
			'fields' => array('id', 'name'),
			'conditions' => array('parent_id' => null),
			'order' => array('lft ASC')
		));

		$this->set('sections', $sections);

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Section->save($this->request->data)) {
				$this->Session->setFlash('Se edit&oacute; la Sección!', 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('No se pudo guardar la Sección :S', 'default', array('class'=>'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Section.' . $this->Section->primaryKey => $id));
			$this->request->data = $this->Section->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Section->id = $id;
		if (!$this->Section->exists()) {
			throw new NotFoundException(__('Invalid section'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Section->delete()) {
			$this->Session->setFlash('Se elimin&oacute; la Sección!', 'default', array('class'=>'alert alert-success'));
		} else {
			$this->Session->setFlash('No se pudo eliminar la Sección :S', 'default', array('class'=>'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
