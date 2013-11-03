<?php
App::uses('AppController', 'Controller');
/**
 * ImageInfos Controller
 *
 * @property ImageInfo $ImageInfo
 */
class ImageInfosController extends AppController {
	
/**
 * pagination setup
 *
 */
	public $paginate = array(
		'conditions' => array(
			'ImageInfo.delete_flag IS NULL'
		), 
		'limit' => 24,
		'order' => array('ImageInfo.name' => 'ASC')
	); 

/**
 * index method
 *
 * @return void
 */
	public function index($filter_field = null, $filter_value = null) {
		$this->ImageInfo->recursive = 0;
		if (!is_null($filter_field)) {
			$this->set('imageInfos', $this->paginate(array('ImageInfo.' . $filter_field => $filter_value)));
			$this->set('filter', $filter_value); 
		} else {
			$this->set('imageInfos', $this->paginate());			
		}
		$filters = $this->ImageInfo->find('all', array(
			'fields' => array('ImageInfo.target', 'count(*) AS "Target.count"'),
			'conditions' => array('ImageInfo.delete_flag IS NULL'), 
			'group' => array('ImageInfo.target')
		));
		$this->set('filters', $filters); 
		
	}

/**
 * findGifs method
 *
 * @param void
 * @return void
 */
	public function findGifs() {
		$this->ImageInfo->recursive = 0;
		$this->set('imageInfos', $this->paginate(array('ImageInfo.img LIKE' => '%.gif')));
		$this->set('filter', 'GIFs');
		$this->set('filters', null); 
		$this->render('index'); 
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ImageInfo->id = $id;
		if (!$this->ImageInfo->exists()) {
			throw new NotFoundException(__('Invalid image info'));
		}
		$this->set('imageInfo', $this->ImageInfo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ImageInfo->create();
			if ($this->ImageInfo->save($this->request->data)) {
				$this->Session->setFlash(__('The image info has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image info could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ImageInfo->id = $id;
		if (!$this->ImageInfo->exists()) {
			throw new NotFoundException(__('Invalid image info'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ImageInfo->save($this->request->data)) {
				$this->Session->setFlash(__('The image info has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image info could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ImageInfo->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->ImageInfo->id = $id;
		if (!$this->ImageInfo->exists()) {
			throw new NotFoundException(__('Invalid image info'));
		}
		if ($this->ImageInfo->delete()) {
			$this->Session->setFlash(__('Image info deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Image info was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * remove method
 *
 * @param string $id, string $page
 * @return void
 */
	public function remove($id = null, $target = null, $page = null) {
		$this->ImageInfo->id = $id;
		if (!$this->ImageInfo->exists()) {
			throw new NotFoundException(__('Invalid image info')); 
		}
		$this->ImageInfo->read(null, $id);
		$this->ImageInfo->set('delete_flag', 1);
		$this->ImageInfo->save();
		if (!is_null($target)) {
			$this->redirect(array('action' => 'index', 'target', $target, 'page' => $page)); 
		} else {
			$this->redirect(array('action' => 'index', 'page' => $page)); 			
		}
	}
	
/**
 * search method
 *
 * @param void
 * @return void
 */
	public function search() {
		$query = $this->request->query['q'];
		$this->set('imageInfos', $this->paginate(array(
				'ImageInfo.name LIKE' => '%' . $query . '%'
			)
		)); 
		$filters = $this->ImageInfo->find('all', array(
			'fields' => array('ImageInfo.target', 'count(*) AS "Target.count"'),
			'conditions' => array('ImageInfo.delete_flag IS NULL'), 
			'group' => array('ImageInfo.target')
		));
		$this->set('filters', $filters);
		$this->set('filter', $query); 

		$this->render('index');
	}
	
/**
 * grabImage method
 *
 * @param string $id
 * @return void
 */
	public function grabImage($id = null) {
		if (isset($id)) {
			$this->ImageInfo->read(null, $id);
			$jpeg = $this->ImageInfo->ImageDetail->field('jpg_img');
			$target = $this->ImageInfo->field('target');
			$target_dir = Inflector::slug($target); 
			
			$this->_saveRemoteImage($jpeg, $target_dir); 
			
			$this->redirect(array('action' => 'view', $id)); 
		} else {
			set_time_limit(240);
			// get files for all active images
			$images = $this->ImageInfo->find('all', array('conditions' => array('ImageInfo.delete_flag IS NULL')));
			foreach ($images as $image) {
				$jpeg = $image['ImageDetail']['jpg_img'];
				$target = $image['ImageInfo']['target'];
				$target_dir = Inflector::slug($target); 
				if (strlen($jpeg) > 0) {
					$this->_saveRemoteImage($jpeg, $target_dir); 
				}
			}
			$this->redirect(array('action' => 'index')); 
		}
	}
	
/**
 * batchImages method
 *
 * @param void
 * @return void
 */
	public function batchImages() {
		set_time_limit(240);
		// get image files for all images
		$images = $this->ImageInfo->find('all', array('conditions' => array('ImageInfo.delete_flag IS NULL')));
		foreach ($images as $image) {
			$jpeg = $image['ImageDetail']['jpg_img'];
			if (strlen($jpeg) > 0) {
				$this->_saveRemoteImage($jpeg, 'all'); 
			}
		}
		$this->redirect(array('action' => 'index'));
	}
	
/**
 * _saveRemoteImage function
 *
 * @param $image_file string, $dir string
 * @return void
 */
	private function _saveRemoteImage($image_file = null, $dir = null) {
		$remote_file = 'http://photojournal.jpl.nasa.gov' . $image_file;
		$dir_path = $_SERVER['DOCUMENT_ROOT'] . '/app/webroot/cassini_images/' . $dir;  
		if (!file_exists($dir_path)) {
			mkdir($dir_path); 
		}
		$local_file = $dir_path . substr($image_file, 5);  
		
		// use cURL to get the image
		$ch = curl_init($remote_file);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
		$rawdata = curl_exec($ch);
		curl_close($ch);
		
		// save image
		
		if (file_exists($local_file)) {
		    unlink($local_file); 
		}
		$fp = fopen($local_file, 'x');
		fwrite($fp, $rawdata);
		fclose($fp);
	}

/**
 * fixCredits method
 *
 * @param void
 * @return voi
 */
	public function fixCredits() {
		$images = $this->ImageInfo->find('all', array(
			'conditions' => array(
				'ImageInfo.delete_flag is null',
				'ImageDetail.credit is null'
			)
		));
		foreach ($images as $image) {
			$html = $image['ImageDetail']['text_block'];
			$text = explode('<dd>', $html);
			$credit = substr($text[2], 0, strpos($text[2], '</dd>'));
			$date = substr($text[3], 0, strpos($text[3], '</dd>'));
			$data[] = array($image['ImageInfo']['name'], $credit, $date);

			$image['ImageDetail']['credit'] = $credit;
			$image['ImageDetail']['date'] = $date;
			$this->ImageInfo->ImageDetail->id = $image['ImageDetail']['id']; 
			$this->ImageInfo->ImageDetail->save($image); 
		}
		$this->set('data', $data); 
		// $this->set('images', $images);
		
	}
	
/**
 * fixDescriptions method
 *
 * @param void
 * @return void
 */
	public function fixDescriptions() {
		/* 
		$images = $this->ImageInfo->find('all', array(
			'conditions' => array(
				'ImageInfo.delete_flag is null'
			)
		));
		foreach ($images as $image) {
			$new_desc = strip_tags(substr($image['ImageDetail']['caption'], 0, strpos($image['ImageDetail']['caption'], '.') + 1));
			$this->ImageInfo->id = $image['ImageInfo']['id'];
			$this->ImageInfo->set('img_desc', $new_desc);
			$this->ImageInfo->save(); 
		}
		*/
		
		$this->ImageInfo->recursive = 0; 
		$this->paginate = array(
			'limit' => 50,
			'order' => array(
				'ImageInfo.name' => 'ASC'
			), 
			'conditions' => array(
				'ImageInfo.delete_flag IS NULL'
			)
		);
		$this->set('images', $this->paginate()); 
	}
	
/**
 * trimDataFields method
 *
 * @param void
 * @return void
 */
	public function trimDataFields() {
		$images = $this->ImageInfo->find('all', array(
			'conditions' => array(
				'ImageInfo.delete_flag is null'
			)
		));
		foreach ($images as $image) {
			$image['ImageDetail']['credit'] = trim($image['ImageDetail']['credit']);
			$image['ImageDetail']['date'] = trim($image['ImageDetail']['date']);
			$this->ImageInfo->ImageDetail->id = $image['ImageDetail']['id'];
			$this->ImageInfo->ImageDetail->save($image); 
		}
		$this->redirect(array('action' => 'index')); 
	}
	
}
