<?php
App::uses('AppController', 'Controller');

class PostsController extends AppController
{
	public $uses = array('Post', 'Album', 'Pic', 'Video', 'Section', 'Tag', 'Tagged');
	public $helpers = array('Paginator', 'Js', 'Timeoptions', 'TinyMCE.TinyMCE');

	public $layout = 'admin';
	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Session');

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->set('title_for_layout', 'Administrar Notas');
		$this->set('pageHeader', 'Notas');
		$this->set('sectionTitle', 'Lista de Notas');

		$this->Post->recursive = 0;
		$this->Paginator->settings= array(
			'conditions' => array(
				'Post.status' => 1,
			),
			'order' => array(
				'Post.id' => 'DESC',
			),
		);
		$this->set('posts', $this->Paginator->paginate());
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		$this->set('title_for_layout', 'Administrar Notas');
		$this->set('pageHeader', 'Notas');
		$this->set('sectionTitle', 'Agregar Notas');

		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}

		$conditions = array('Section.status' => 1);
		$sections = $this->Section->generateTreeList($conditions, null, null, ' - ', -1);
		$this->set(compact('sections'));
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		$this->set('title_for_layout', 'Administrar Notas');
		$this->set('pageHeader', 'Notas');
		$this->set('sectionTitle', 'Editar Nota');

		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$this->request->data = $this->Post->find('first', $options);
		}
		$conditions = array('Section.status' => 1);
		$sections = $this->Section->generateTreeList($conditions, null, null, ' - ', -1);
		$this->set(compact('sections'));
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
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->allowMethod('post', 'delete');
		$this->request->data['Post']['status'] = 0;
		if ($this->Post->save($this->request->data)) {
			$this->Session->setFlash(__('The post has been deleted.'));
		} else {
			$this->Session->setFlash(__('The post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
