<?php
App::uses('AppController', 'Controller');
/**
 * ImageDetails Controller
 *
 * @property ImageDetail $ImageDetail
 */
class ImageDetailsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ImageDetail->recursive = 0;
		$this->set('imageDetails', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ImageDetail->id = $id;
		if (!$this->ImageDetail->exists()) {
			throw new NotFoundException(__('Invalid image detail'));
		}
		$this->set('imageDetail', $this->ImageDetail->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ImageDetail->create();
			if ($this->ImageDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The image detail has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image detail could not be saved. Please, try again.'));
			}
		}
		$imageInfos = $this->ImageDetail->ImageInfo->find('list');
		$this->set(compact('imageInfos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ImageDetail->id = $id;
		if (!$this->ImageDetail->exists()) {
			throw new NotFoundException(__('Invalid image detail'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ImageDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The image detail has been saved'));
				$infoId = $this->ImageDetail->field('image_info_id'); 
				$this->redirect(array('controller' => 'image_infos', 'action' => 'view', $infoId));
			} else {
				$this->Session->setFlash(__('The image detail could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ImageDetail->read(null, $id);
		}
		$imageInfos = $this->ImageDetail->ImageInfo->find('list');
		$this->set(compact('imageInfos'));
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
		$this->ImageDetail->id = $id;
		if (!$this->ImageDetail->exists()) {
			throw new NotFoundException(__('Invalid image detail'));
		}
		if ($this->ImageDetail->delete()) {
			$this->Session->setFlash(__('Image detail deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Image detail was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
}
