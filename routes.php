<?php

$router->get('', 'HomeController@index');

$router->get('postos', 'PostoController@index');
$router->get('postos/{estado}/{cidade}', 'PostoController@index');

$router->get('admin', 'Admin\LoginController@index');
$router->get('admin/login', 'Admin\LoginController@index');
$router->post('admin/login', 'Admin\LoginController@login');
