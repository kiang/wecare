<?php

Router::connect('/', array('controller' => 'contacts', 'action' => 'add'));
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
CakePlugin::routes();

require CAKE . 'Config' . DS . 'routes.php';
