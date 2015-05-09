<?php
App::uses('AppController', 'Controller');
/**
 * Albums Controller
 *
 */
class AlbumsController extends AppController {
	public $uses = array('Album', 'Photo', 'Section', 'Tag', 'Tagged');
	public $helpers = array('Paginator', 'Js', 'Thumbs', 'Timeoptions');
	public $components = array('Paginator', 'Session');

	public $layout = 'admin';

	public function admin_index() {
		$this->set('title_for_layout', 'Administrar Galerías');
		$this->set('pageHeader', 'Galerías');
		$this->set('sectionTitle', 'Lista de Galerías');

		$this->Album->recursive = 0;
		$this->Paginator->settings= array(
			'conditions' => array(
				'Album.status' => 1,
			),
			'order' => array(
				'Album.id' => 'DESC',
			),
		);
		$this->set('albums', $this->Paginator->paginate());
	}
	public function admin_add() {
		$this->set('title_for_layout', 'Administrar Galerías');
		$this->set('pageHeader', 'Galerías');
		$this->set('sectionTitle', 'Agregar Galerías');

		$conditions = array('Section.status' => 1);
		$sections = $this->Section->generateTreeList($conditions, null, null, ' - ', -1);
		$this->set('sections', $sections);

		if (!empty($this->data)) {
			$this->Album->create();

			if ($this->Album->save($this->request->data)) {
				$this->Session->setFlash('Se agreg&oacute; la nueva Galería!', 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'admin_index'));
			} else {
				$this->Session->setFlash('No se pudo guardar la Galería :S', 'default', array('class'=>'alert alert-danger'));
			}
		}
	}

	public function admin_edit($id = null) {
		$this->set('title_for_layout', 'Administrar Galerías');
		$this->set('pageHeader', 'Galerías');
		$this->set('sectionTitle', 'Editar Galería');

		$this->Album->recursive = -1;
		$album = $this->Album->findById($id);

		if ( !empty( $album ) ) {
			$conditions = array('Section.status' => 1);
			$sections = $this->Section->generateTreeList($conditions, null, null, ' - ', -1);
			$this->set('sections', $sections);

			$tags = $this->Tagged->find('all', array(
				'conditions' => array(
					'model' => 'album',
					'model_id' => $id
				),
			));
			$this->set('tags', $tags);

			if ( !empty($this->data) ) {
				if ($this->Album->save($this->request->data)) {
					$this->Session->setFlash('Se edit&oacute; la nueva Galería!', 'default', array('class'=>'alert alert-success'));
					return $this->redirect(array('action' => 'admin_index'));
				} else {
					$this->Session->setFlash('No se pudo guardar la Galería :S', 'default', array('class'=>'alert alert-danger'));
				}
			}
		} else {
			$this->Session->setFlash('No existe Galería con este ID :S', 'default', array('class'=>'alert alert-danger'));
			return $this->redirect('/admin/albums/');
		}

		$this->set('album', $album);
	}

	public function admin_delete($id = null) {
		$this->autoRender = false;

		$album = $this->Album->find('first', array(
			'conditions' => array(
				'Album.id' => $id
			)
		));

		if ($album) {
			$album['Album']['status'] = 0;
			if ($this->Album->save($album) ) {
				$this->Session->setFlash('Se desactiv&oacute; la Galería con exito!', 'default', array('class'=>'alert alert-success'));

				return $this->redirect('/admin/albums/index');
			} else {
				$this->Session->setFlash('No se borro la Galería :(', 'default', array('class'=>'alert alert-danger'));

				return $this->redirect('/admin/albums/index');
			}

		} else {
			$this->Session->setFlash('No existe Galería con este ID :(', 'default', array('class'=>'alert alert-danger'));

			return $this->redirect('/admin/albums/index');
			return $this->redirect('/admin/albums/index');
		}
	}
	public function admin_view($id = null) {
		$this->set('title_for_layout', 'Administrar Galerías');
		$this->set('pageHeader', 'Galerías');
		$this->set('sectionTitle', 'Ver Fotos de la Galería');

		$album = $this->Album->findById($id);
		$this->set('album', $album);
	}

	public function autocomplete() {
		$this->autoRender = false;
		$this->layout = "ajax";
		$term = $_GET['term'];
		$album = $this->Album->find('all', array(
			'recursive' => -1,
			'conditions' => array('Album.title LIKE' => $term.'%')
		));

		$term_return = array();

		foreach($album as $t){
			$term_return[] = array(
				'value' => $t['Album']['title'],
				'label' => $t['Album']['title'],
				'id' => $t['Album']['id']
			);
		}

		if ($this->request->is('ajax') ) {
			echo json_encode($term_return);
		} else {
			return json_encode($term_return);
		}
	}
}
