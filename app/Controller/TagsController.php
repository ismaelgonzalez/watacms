<?php
App::uses('AppController', 'Controller');

class TagsController extends AppController {
	public $uses = array('Tag', 'Tagged');
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
		$this->set('title_for_layout', 'Administrar Tags');
		$this->set('pageHeader', 'Tags');
		$this->set('sectionTitle', 'Lista de Tags');

		$this->Tag->recursive = 0;
		$this->Paginator->settings= array(
			'order' => array(
				'Tag.id' => 'DESC',
			),
		);
		$this->set('tags', $this->Paginator->paginate());
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		$this->set('title_for_layout', 'Administrar Tags');
		$this->set('pageHeader', 'Tags');
		$this->set('sectionTitle', 'Agregar');

		if (!empty($this->data)) {
			$this->Tag->create();

			if ($this->Tag->save($this->request->data)) {
				$this->Session->setFlash('Se agreg&oacute; el nuevo Tag!', 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'admin_index'));
			} else {
				$this->Session->setFlash('No se pudo guardar al Tag :S', 'default', array('class'=>'alert alert-danger'));
			}
		}

		$tagSizes = $this->Tag->TagSize->find('list');
		$this->set(compact('tagSizes'));
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		$this->set('title_for_layout', 'Administrar Tags');
		$this->set('pageHeader', 'Tags');
		$this->set('sectionTitle', 'Editar');

		$tag = $this->Tag->findById($id);
		if (empty($tag)) {
			$this->Session->setFlash('No existe Tag con este ID :(', 'default', array('class'=>'alert alert-danger'));

			return $this->redirect('/admin/tags/index');
		}

		$this->set('tag', $tag);

		if (!empty($this->data)) {
			if (!$this->Tag->save($this->data)) {
				$this->Session->setFlash('No se pudo guardar al Tag  :S', 'default', array('class'=>'alert alert-danger'));

				return false;
			}

			$this->Session->setFlash('Se editó al Tag!', 'default', array('class'=>'alert alert-success'));

			return $this->redirect('/admin/tags/index');
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
		$this->autoRender = false;

		$tag = $this->Tag->find('first', array(
			'conditions' => array(
				'Tag.id' => $id
			)
		));

		$tagged_conditions = array(
			'Tagged.tag_id' => $id,
		);

		if ($tag) {
			if ($this->Tag->delete($id)) {
				if ($this->Tagged->deleteAll($tagged_conditions)) {
					$this->Session->setFlash('Se desactiv&oacute; al Tag con exito!', 'default', array('class'=>'alert alert-success'));

					return $this->redirect('/admin/tags/index');
				}
			} else {
				$this->Session->setFlash('No se borro el Tag :(', 'default', array('class'=>'alert alert-danger'));

				return $this->redirect('/admin/tags/index');
			}

		} else {
			$this->Session->setFlash('No existe Tag con este ID :(', 'default', array('class'=>'alert alert-danger'));

			return $this->redirect('/admin/tags/index');
		}
	}
}