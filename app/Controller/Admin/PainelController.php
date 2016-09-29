<?php

namespace App\Controller\Admin;

class PainelController
{
    public function __construct()
    {
        // Do Auth
    }
    public function index()
    {
        return view('admin.painel');
    }
}
