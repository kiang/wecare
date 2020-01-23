<?php

App::uses('AppModel', 'Model');

class Task extends AppModel {

    var $name = 'Task';

    var $validate = array(

        'count_need' => array(

            'numberFormat' => array(

                'rule' => 'numeric',

                'message' => 'Wrong format',

                'allowEmpty' => true,

            ),

        ),

        'count_contacts' => array(

            'numberFormat' => array(

                'rule' => 'numeric',

                'message' => 'Wrong format',

                'allowEmpty' => true,

            ),

        ),

    );
                

    var $actsAs = array(

    );



    var $belongsTo = array(

        'Point' => array(


            'foreignKey' => 'Point_id',



            'className' => 'Point',


        ),

    );

    var $hasMany = array(

        'Contact' => array(


            'foreignKey' => 'Task_id',



            'dependent' => false,



            'className' => 'Contact',


        ),

    );



    function afterSave($created, $options = array()) {

	}

}