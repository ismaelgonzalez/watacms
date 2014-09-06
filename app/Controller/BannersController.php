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
		$this->Paginator->settings= array(
			'conditions' => array(
				'Banner.status' => 1,
			),
			'order' => array(
				'Banner.id' => 'DESC',
			),
		);
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

		$banner = $this->Banner->findById($id);
		if (empty($banner)) {
			$this->Session->setFlash('No existe Banner con este ID :(', 'default', array('class'=>'alert alert-danger'));

			return $this->redirect('/admin/banners/index');
		}

		$this->set('banner', $banner);

		if (!empty($this->data)) {
			if (empty($this->data['Banner']['pic']['name'])) {
				unset($this->request->data['Banner']['pic']);
			}

			if (!$this->Banner->save($this->data)) {
				$this->Session->setFlash('No se pudo guardar al Banner  :S', 'default', array('class'=>'alert alert-danger'));

				return false;
			}

			$this->Session->setFlash('Se editó al Banner!', 'default', array('class'=>'alert alert-success'));

			return $this->redirect('/admin/banners/index');
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
		$this->autoRender = false;

		$banner = $this->Banner->find('first', array(
			'conditions' => array(
				'Banner.id' => $id
			),
			'fields' => array(
				'Banner.id',
				'Banner.name',
				'Banner.status',
			)
		));

		if ($banner) {
			$banner['Banner']['status'] = 0;
			if ($this->Banner->save($banner) ) {
				$this->Session->setFlash('Se desactiv&oacute; al Banner con exito!', 'default', array('class'=>'alert alert-success'));

				return $this->redirect('/admin/banners/index');
			} else {
				$this->Session->setFlash('WTF No se borro el Banner :(', 'default', array('class'=>'alert alert-danger'));

				return $this->redirect('/admin/banners/index');
			}

		} else {
			$this->Session->setFlash('No existe Banner con este ID :(', 'default', array('class'=>'alert alert-danger'));

			return $this->redirect('/admin/banners/index');
		}
	}
}
