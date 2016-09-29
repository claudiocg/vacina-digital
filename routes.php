<?php

$router->get('', 'HomeController@index');

$router->get('postos', 'PostoController@index');
$router->get('postos/{estado}/{cidade}', 'PostoController@index');

/*
Sistema de Cadastros:
    
 */

