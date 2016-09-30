<?php

return [
	'database' => [
		'name' => '',
		'host' => '',
		'username' => '',
		'password' => '',
		'options' => [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
		]
	],
    // production: desabilita o debug de erro 
    // development: habilita o debug de erro
    'env' => 'development'
];
