<?php

App::uses('AppModel', 'Model');

class Contact extends AppModel {

    var $name = 'Contact';
                

    var $actsAs = array(

    );



    var $belongsTo = array(

        'Task' => array(


            'foreignKey' => 'Task_id',



            'className' => 'Task',


        ),

    );



    function afterSave($created, $options = array()) {

	}

}