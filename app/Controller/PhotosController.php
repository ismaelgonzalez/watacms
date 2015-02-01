<?php
App::uses('AppController', 'Controller');
/**
 * Photos Controller
 *
 */
class PhotosController extends AppController {
	public $uses = array('Album', 'Photo');
	public $helpers = array('Paginator', 'Js', 'Thumbs');
	public $components = array('Paginator', 'Session');

	public $layout = 'admin';

	public function admin_index() {
		return $this->redirect('/admin/');
	}

	public function admin_add( $id = null) {
		$this->set('title_for_layout', 'Administrar Galerías');
		$this->set('pageHeader', 'Galerías - Fotos');
		$this->set('sectionTitle', 'Agregar Fotos');

		if ($id) {
			$albums = $this->Album->find('list', array(
				'conditions' => array('Album.id' => $id),
				'order' => array('Album.id DESC'),
				));

			$this->set('albums', $albums);
			$this->set('album_id', $id);

			if (!empty($this->request->data)) {
				$photos = array();
				for ( $i = 1; $i <= 5; $i++ ) {
					if ($this->request->data['Photo']['pic' . $i]['error'] == '0') {
						$photos[] = array(
							'Photo' => array(
								'album_id' => $this->request->data['Photo']['album_id'],
								'title'    => $this->request->data['Photo']['title' . $i],
								'blurb'    => $this->request->data['Photo']['blurb' . $i],
								'pic'      => $this->request->data['Photo']['pic' . $i]
							)
						);
					}
				}

				foreach ($photos as $p) {
					$this->Photo->create();

					if (!$this->Photo->save($p)) {
						$this->Session->setFlash('No se pudo guardar la Galería :S', 'default', array('class'=>'alert alert-danger'));
					}
				}

				$this->Session->setFlash('Se agregaron las fotos a la Galería!', 'default', array('class'=>'alert alert-success'));
				return $this->redirect('/admin/albums/view/' . $id);
			}
		}
	}

	public function admin_edit($id = null) {
		$this->set('title_for_layout', 'Administrar Galerías');
		$this->set('pageHeader', 'Galerías - Fotos');
		$this->set('sectionTitle', 'Editar Foto');

		$photo = $this->Photo->findById($id);
		$this->set('photo', $photo);

		if (!empty($photo)) {
			$albums = $this->Album->find('list', array(
				'order' => array('Album.id DESC'),
			));

			$this->set('albums', $albums);

			if (!empty($this->data)) {
				if ($this->Photo->save($this->request->data)) {
					$this->Session->setFlash('Se edit&oacute; la foto con éxito!', 'default', array('class'=>'alert alert-success'));
					return $this->redirect('/admin/albums/view/' . $photo['Photo']['album_id']);
				} else {
					$this->Session->setFlash('No se pudo editar la foto :S', 'default', array('class'=>'alert alert-danger'));
				}
			}
		} else {
			$this->Session->setFlash('No existe Foto con este ID :S', 'default', array('class'=>'alert alert-danger'));
			return $this->redirect('/admin/albums/view/' . $photo['Photo']['album_id']);
		}
	}

	public function admin_delete($id = null) {
		$this->autoRender = false;
		$this->Photo->recursive = -1;
		$photo = $this->Photo->findById($id);
		$this->set('photo', $photo);

		if (!empty($photo)) {
			$photo['Photo']['status'] = 0;
			if ($this->Photo->save($photo)) {
				$this->Session->setFlash('Se borró la foto con éxito!', 'default', array('class'=>'alert alert-success'));
				return $this->redirect('/admin/albums/view/' . $photo['Photo']['album_id']);
			} else {
				$this->Session->setFlash('No se pudo borrar la foto :S', 'default', array('class'=>'alert alert-danger'));
				return $this->redirect('/admin/albums/view/' . $photo['Photo']['album_id']);
			}
		} else {
			$this->Session->setFlash('No existe Foto con este ID :S', 'default', array('class'=>'alert alert-danger'));
			return $this->redirect('/admin/albums/view/' . $photo['Photo']['album_id']);
		}
	}

	/*
	 * This is for testing only
	 */
	public function admin_view($album_id) {
		$album = $this->Album->findById($album_id);
		$this->set('album', $album);
	}
}