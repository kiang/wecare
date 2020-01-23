<?php

App::uses('AppController', 'Controller');

class ContactsController extends AppController {

    public $name = 'Contacts';
    public $paginate = array();
    public $helpers = array();


    function index($foreignModel = null, $foreignId = 0) {
        $foreignId = intval($foreignId);
        $foreignKeys = array();

        $foreignKeys = array(

            'Task' => 'Task_id',

            );


        $scope = array();
        if(array_key_exists($foreignModel, $foreignKeys) && $foreignId > 0) {
            $scope['Contact.' . $foreignKeys[$foreignModel]] = $foreignId;

        } else {
            $foreignModel = '';
        }
        $this->set('scope', $scope);
        $this->paginate['Contact']['limit'] = 20;
        $items = $this->paginate($this->Contact, $scope);
        $this->set('items', $items);
        $this->set('foreignId', $foreignId);
        $this->set('foreignModel', $foreignModel);
    }


    function view($id = null) {
        if (!$id || !$this->data = $this->Contact->read(null, $id)) {
            $this->Session->setFlash(__('Please do following links in the page', true));
            $this->redirect(array('action'=>'index'));
        }
    }





    function admin_index($foreignModel = null, $foreignId = 0, $op = null) {
        $foreignId = intval($foreignId);
        $foreignKeys = array();

        $foreignKeys = array(

            'Task' => 'Task_id',

        );


        $scope = array();
        if(array_key_exists($foreignModel, $foreignKeys) && $foreignId > 0) {
            $scope['Contact.' . $foreignKeys[$foreignModel]] = $foreignId;

        } else {
            $foreignModel = '';
        }
        $this->set('scope', $scope);
        $this->paginate['Contact']['limit'] = 20;
        $items = $this->paginate($this->Contact, $scope);

        $this->set('items', $items);
        $this->set('foreignId', $foreignId);
        $this->set('foreignModel', $foreignModel);
    }


    function admin_view($id = null) {
        if (!$id || !$this->data = $this->Contact->read(null, $id)) {
            $this->Session->setFlash(__('Please do following links in the page', true));
            $this->redirect(array('action'=>'index'));
        }
    }


    function admin_add($foreignModel = null, $foreignId = 0) {
        $foreignId = intval($foreignId);
        $foreignKeys = array(

            'Task' => 'Task_id',

        );
        if(array_key_exists($foreignModel, $foreignKeys) && $foreignId > 0) {
            if (!empty($this->data)) {
                $this->data['Contact'][$foreignKeys[$foreignModel]] = $foreignId;
            }
        } else {
            $foreignModel = '';
        }
        if (!empty($this->data)) {
            $this->Contact->create();
            $dataToSave = $this->data;
            if(!empty($foreignModel)) {
                $dataToSave['Contact'][$foreignKeys[$foreignModel]] = $foreignId;
            }
            if ($this->Contact->save($dataToSave)) {
                $this->Session->setFlash(__('The data has been saved', true));
                if(!empty($foreignModel)) {
                    $this->redirect(array('action'=>'index', $foreignModel, $foreignId));
                } else {
                    $this->redirect(array('action'=>'index'));
                }
            } else {
                $this->Session->setFlash(__('Something was wrong during saving, please try again', true));
            }
        }
        $this->set('foreignId', $foreignId);
        $this->set('foreignModel', $foreignModel);
        
        $belongsToModels = array(
            'listTask' => array(
                'label' => '班表',
                'modelName' => 'Task',
                'foreignKey' => 'Task_id',
            ),
        );

        foreach($belongsToModels AS $key => $model) {
            if($foreignModel == $model['modelName']) {
                unset($belongsToModels[$key]);
                continue;
            }
            $this->set($key, $this->Contact->{$model['modelName']}->find('list'));
        }
        $this->set('belongsToModels', $belongsToModels);
    }


    function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Please do following links in the page', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->Contact->save($this->data)) {
                $this->Session->setFlash(__('The data has been saved', true));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Session->setFlash(__('Something was wrong during saving, please try again', true));
            }
        }
        $this->set('id', $id);
        $this->data = $this->Contact->read(null, $id);

        $belongsToModels = array(
            'listTask' => array(
                'label' => '班表',
                'modelName' => 'Task',
                'foreignKey' => 'Task_id',
            ),
        );

        foreach($belongsToModels AS $key => $model) {
            $this->set($key, $this->Contact->{$model['modelName']}->find('list'));
        }
        $this->set('belongsToModels', $belongsToModels);
    }

    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Please do following links in the page', true));
        } else if ($this->Contact->delete($id)) {
            $this->Session->setFlash(__('The data has been deleted', true));
        }
        $this->redirect(array('action'=>'index'));
    }


}