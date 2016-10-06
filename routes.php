<?php

$router->get('', 'HomeController@index');

// Admin Routes
$router->get('admin', 'Admin\LoginController@index');
$router->get('admin/login', 'Admin\LoginController@index');
$router->post('admin/login', 'Admin\LoginController@login');

$router->get('admin/painel', 'Admin\PainelController@index');

$router->get('admin/agentes', 'Admin\AgenteController@index');
$router->get('admin/agentes/cadastrar', 'Admin\AgenteController@create');
$router->post('admin/agentes', 'Admin\AgenteController@store');
$router->get('admin/agentes/{id}', 'Admin\AgenteController@show');
$router->get('admin/agentes/{id}/editar', 'Admin\AgenteController@edit');
$router->patch('admin/agentes/{id}', 'Admin\AgenteController@update');
