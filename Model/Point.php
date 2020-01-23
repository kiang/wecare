<?php

App::uses('AppModel', 'Model');

class Point extends AppModel {

    var $name = 'Point';
                

    var $actsAs = array(

    );



    var $hasMany = array(

        'Task' => array(


            'foreignKey' => 'Point_id',



            'dependent' => false,



            'className' => 'Task',


        ),

    );



    function afterSave($created, $options = array()) {

	}

}