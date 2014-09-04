<?php
App::uses('AppController', 'Controller');
/**
 * Banners Controller
 *
 * @property Banner $Banner
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BannersController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Paginator', 'Js', 'Thumbs');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	public $layout = 'admin';
/**
 * index method
 *
 * @return void
 */
	public function index() {
		return $this->redirect("/");
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->set('title_for_layout', 'Administrar Banners');
		$this->set('pageHeader', 'Banners');
		$this->set('sectionTitle', 'Lista de Banners');

		$this->Banner->recursive = 0;
		$this->set('banners', $this->Paginator->paginate());
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->set('title_for_layout', 'Administrar Banners');
		$this->set('pageHeader', 'Banners');
		$this->set('sectionTitle', 'Agregar');

		if (!empty($this->data)) {
			$this->Banner->create();

			if (empty($this->data['Banner']['pic']['name'])) {
				unset($this->request->data['Banner']['pic']);
			}

			if ($this->Banner->save($this->request->data)) {
				$this->Session->setFlash('Se agreg&oacute; el nuevo Banner!', 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'admin_index'));
			} else {
				$this->Session->setFlash('No se pudo guardar al Banner :S', 'default', array('class'=>'alert alert-danger'));
			}
		}

		$bannerSizes = $this->Banner->BannerSize->find('list');
		$this->set(compact('bannerSizes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->set('title_for_layout', 'Administrar Banners');
		$this->set('pageHeader', 'Banners');
		$this->set('sectionTitle', 'Editar');

		if (!$this->Banner->exists($id)) {
			throw new NotFoundException(__('Banner Invalid0 banner'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Banner->save($this->request->data)) {
				$this->Session->setFlash(__('The banner has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banner could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
			$this->request->data = $this->Banner->find('first', $options);
		}
		$bannerSizes = $this->Banner->BannerSize->find('list');
		$this->set(compact('bannerSizes'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Banner->id = $id;
		if (!$this->Banner->exists()) {
			throw new NotFoundException(__('Invalid banner'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Banner->delete()) {
			$this->Session->setFlash(__('The banner has been deleted.'));
		} else {
			$this->Session->setFlash(__('The banner could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
