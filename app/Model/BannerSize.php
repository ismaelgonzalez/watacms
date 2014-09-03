<?php
App::uses('AppModel', 'Model');
/**
 * BannerSize Model
 *
 * @property Banner $Banner
 */
class BannerSize extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'size';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Banner' => array(
			'className' => 'Banner',
			'foreignKey' => 'banner_size_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
