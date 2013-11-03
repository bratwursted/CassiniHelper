<?php
App::uses('AppModel', 'Model');
/**
 * ImageDetail Model
 *
 * @property ImageInfo $ImageInfo
 */
class ImageDetail extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ImageInfo' => array(
			'className' => 'ImageInfo',
			'foreignKey' => 'image_info_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
