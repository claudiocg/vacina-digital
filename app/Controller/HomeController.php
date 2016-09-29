<?php

namespace App\Controller;

class HomeController
{
	public function __construct()
	{
		//$agentes = $this->database->all('agente');
		return view('index');
	}
	public function index()
	{
		echo 'qualquer coisa';
	}
}