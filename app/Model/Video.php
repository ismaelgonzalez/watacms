<?php
App::uses('AppModel', 'Model');
/**
 * Video Model
 *
 * @property Section $Section
 */
class Video extends AppModel {
	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'title';

	public $actsAs = array('Taggable');
	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'section_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'La sección es requerida',
				'required' => true,
			),
		),
		'published_date' => array(
			'date' => array(
				'rule' => array('notEmpty'),
				'message' => 'Fecha de Publicación es requerida',
				'required' => true,
				'allowEmpty' => true,
			),
		),
		'published_time' => array(
			'time' => array(
				'rule' => array('notEmpty'),
				'message' => 'Tiempo de Publicación es requerido',
				'required' => true,
				'allowEmpty' => true,
			),
		),
	);

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'Section' => array(
			'className' => 'Section',
			'foreignKey' => 'section_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'Tagged' => array(
			'foreignKey' => 'model_id'
		)
	);

	public function beforeSave($options = array()) {
		parent::beforeSave();

		$this->data[$this->alias]['status'] = isset($this->data[$this->alias]['status']) ? $this->data[$this->alias]['status'] : 1;

		//saving the start and end dates
		if (!empty($this->data[$this->alias]['published_date'])) {
			$this->data[$this->alias]['published_date'] = date("Y-m-d", strtotime($this->data[$this->alias]['published_date']));
		}

		if (!isset($this->data[$this->alias]['time_is_set'])) {
			if ($this->data[$this->alias]['published_time'] == 0) {
				$this->data[$this->alias]['published_time'] = date("H:i");
			} else {
				if (strstr($this->data[$this->alias]['published_time'], ':')) {
					$this->data[$this->alias]['published_time'] = date("H:i", strtotime($this->data[$this->alias]['published_time']));
				} else {
					$this->data[$this->alias]['published_time'] = date("H:i", strtotime($this->data[$this->alias]['published_time'] . ':00'));
				}
			}
		} else {
			unset($this->data[$this->alias]['published_time']);
		}

		$this->data[$this->alias]['video_number'] = $this->get_video_number( $this->data[$this->alias]['video'] );

		return true;
	}

	/*
	 * This function returns the video number for a video
	 * @params string $video
	 * @return string $video_number
	 */
	private function get_video_number( $video ) {
		$video_number = '';
		$vid = array();

		if ( strstr( $video, 'https://www.youtube.com/watch?v=' ) ) { //if video link is the long form youtube url
			$vid = explode( 'https://www.youtube.com/watch?v=', $video );
			$video_number = $vid[1];
		} elseif ( strstr( $video, 'http://youtu.be/' ) ) { //if video link is short form youtube url
			$vid = explode( 'http://youtu.be/', $video );
			$video_number = $vid[1];
		} elseif ( strstr( $video, 'https://vimeo.com/' ) ) { //if vimeo url
			$vid = explode( 'https://vimeo.com/', $video );
			$video_number = $vid[1];
		}

		return $video_number;
	}
}
