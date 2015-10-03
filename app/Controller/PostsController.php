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

		$this->Post->recursive = -1;
		$post = $this->Post->findById($id);
		if (empty($post)) {
			$this->Session->setFlash('No existe Post con este ID :(', 'default', array('class'=>'alert alert-danger'));

			return $this->redirect('/admin/posts/index');
		}

		$conditions = array('Section.status' => 1);
		$sections = $this->Section->generateTreeList($conditions, null, null, ' - ', -1);
		$this->set('sections', $sections);
		$this->set('post', $post);

		$tags = $this->Tagged->find('all', array(
			'conditions' => array(
				'model' => 'post',
				'model_id' => $id
			),
		));
		$this->set('tags', $tags);

		if (empty($this->data['Post']['pic']['name'])) {
			unset($this->request->data['Post']['pic']);
		}

		if (!empty($this->request->data)) {
			if (!$this->Post->save($this->request->data)) {
				$this->Session->setFlash('No se pudo guardar el Post :S', 'default', array('class'=>'alert alert-danger'));

				return false;
			}

			$this->Session->setFlash('Se editó el Post!', 'default', array('class'=>'alert alert-success'));

			return $this->redirect('/admin/posts/index');
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

		$post = $this->Post->find('first', array(
			'conditions' => array(
				'Post.id' => $id
			)
		));

		if ($post) {
			$post['Post']['status'] = 0;
			if ($this->Post->save($post) ) {
				$this->Session->setFlash('Se desactiv&oacute; al Post con exito!', 'default', array('class'=>'alert alert-success'));

				return $this->redirect('/admin/posts/index');
			} else {
				$this->Session->setFlash('No se borro el Post :(', 'default', array('class'=>'alert alert-danger'));

				return $this->redirect('/admin/posts/index');
			}

		} else {
			$this->Session->setFlash('No existe Post con este ID :(', 'default', array('class'=>'alert alert-danger'));

			return $this->redirect('/admin/posts/index');
		}
	}
}
