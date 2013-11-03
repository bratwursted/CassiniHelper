<?php
App::uses('AppModel', 'Model');
/**
 * ImageInfo Model
 *
 * @property ImageDetail $ImageDetail
 */
class ImageInfo extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'ImageDetail' => array(
			'className' => 'ImageDetail',
			'foreignKey' => 'image_info_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
