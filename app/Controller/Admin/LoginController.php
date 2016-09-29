<?php

namespace App\Controller\Admin;

use App\Model\Usuario;

class LoginController
{
    public function index()
    {
        return view('admin.login');
    }
    public function login()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = Usuario::select(['id','usuario','senha'])
            ->where('usuario', $email)->get()->first();

        if ($usuario) {
            if (crypt($senha, $usuario->senha) == $usuario->senha) {
                $_SESSION['usuario'] = [
                    'id' => $usuario->id,
                    'nome' => $usuario->usuario
                ];

                return redirect("admin.painel");
            }
        }

        return view('admin.login');
    }
}
