<?php

App::uses('AppController', 'Controller');

class ContactsController extends AppController {

    public $name = 'Contacts';
    public $paginate = array();
    public $helpers = array();

    public function beforeFilter() {
        parent::beforeFilter();
        if (isset($this->Auth)) {
            $this->Auth->allow('add');
        }
    }

    function add() {
        if(!empty($this->data)) {
            $this->Contact->create();
            $this->Contact->save($this->data);
            $this->Contact->query('update tasks set count_contacts = count_contacts + 1 where tasks.id = ' . intval($this->data['Contact']['Task_id']));
            $this->Session->setFlash('已經收到報名資料，感謝您的參與！');
        }
        $tasks = $this->Contact->Task->find('all', array(
            'conditions' => array(
                'Task.count_contacts < Task.count_need',
                'Point.id IS NOT NULL',
            ),
            'contain' => array(
                'Point',
            ),
            'order' => array(
                'Task.date' => 'ASC',
                'Task.time_begin' => 'ASC',
            ),
        ));
        $this->set('tasks', $tasks);
    }

    function admin_index($foreignModel = null, $foreignId = 0, $op = null) {
        $foreignId = intval($foreignId);
        $foreignKeys = array();

        $foreignKeys = array(
            'Task' => 'Task_id',
        );


        $scope = array();
        if (array_key_exists($foreignModel, $foreignKeys) && $foreignId > 0) {
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
        $task = $this->Contact->Task->read(null, $foreignId);
        $this->set('task', $task);
        $this->set('point', $this->Contact->Task->Point->read(null, $task['Task']['Point_id']));
    }

    function admin_view($id = null) {
        if (!$id || !$this->data = $this->Contact->read(null, $id)) {
            $this->Session->setFlash(__('Please do following links in the page', true));
            $this->redirect(array('action' => 'index'));
        }
    }

    function admin_add($foreignModel = null, $foreignId = 0) {
        $foreignId = intval($foreignId);
        $foreignKeys = array(
            'Task' => 'Task_id',
        );
        if (array_key_exists($foreignModel, $foreignKeys) && $foreignId > 0) {
            if (!empty($this->data)) {
                $this->data['Contact'][$foreignKeys[$foreignModel]] = $foreignId;
            }
        } else {
            $foreignModel = '';
        }
        if (!empty($this->data)) {
            $this->Contact->create();
            $dataToSave = $this->data;
            if (!empty($foreignModel)) {
                $dataToSave['Contact'][$foreignKeys[$foreignModel]] = $foreignId;
            }
            if ($this->Contact->save($dataToSave)) {
                $this->Session->setFlash(__('The data has been saved', true));
                if (!empty($foreignModel)) {
                    $this->redirect(array('action' => 'index', $foreignModel, $foreignId));
                } else {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('Something was wrong during saving, please try again', true));
            }
        }
        $this->set('foreignId', $foreignId);
        $this->set('foreignModel', $foreignModel);
    }

    function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Please do following links in the page', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            $dbData = $this->Contact->read(null, $id);
            if ($this->Contact->save($this->data)) {
                $this->Session->setFlash(__('The data has been saved', true));
                $this->redirect(array('action' => 'index', 'Task', $dbData['Contact']['Task_id']));
            } else {
                $this->Session->setFlash(__('Something was wrong during saving, please try again', true));
            }
        }
        $this->set('id', $id);
        $this->data = $this->Contact->read(null, $id);
    }

    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Please do following links in the page', true));
        } else if ($this->Contact->delete($id)) {
            $this->Session->setFlash(__('The data has been deleted', true));
        }
        $this->redirect(array('action' => 'index'));
    }

}
