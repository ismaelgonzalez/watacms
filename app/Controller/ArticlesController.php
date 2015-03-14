<?php
App::uses('AppController', 'Controller');
/**
 * Articles Controller
 *
 * @property Article $Article
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ArticlesController extends AppController {
	public $uses = array('Article', 'Album', 'Pic', 'Video', 'Section', 'Tag', 'Tagged');
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

		$this->Article->recursive = 0;
		$this->Paginator->settings= array(
			'conditions' => array(
				'Article.status' => 1,
			),
			'order' => array(
				'Article.id' => 'DESC',
			),
		);
		$this->set('articles', $this->Paginator->paginate());
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
			$this->Article->create();
			if ($this->Article->save($this->request->data)) {
				$this->Session->setFlash(__('The article has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The article could not be saved. Please, try again.'));
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

		if (!$this->Article->exists($id)) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Article->save($this->request->data)) {
				$this->Session->setFlash(__('The article has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The article could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Article.' . $this->Article->primaryKey => $id));
			$this->request->data = $this->Article->find('first', $options);
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
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		$this->request->allowMethod('post', 'delete');
		$this->request->data['Article']['status'] = 0;
		if ($this->Article->save($this->request->data)) {
			$this->Session->setFlash(__('The article has been deleted.'));
		} else {
			$this->Session->setFlash(__('The article could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
