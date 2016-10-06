<?php

namespace App\Controller\Admin;

use App\Model\Usuario;
use Framework\Request;

class LoginController
{
    public function index()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $email = $request->post('email');
        $senha = $request->post('senha');

        $usuario = Usuario::select(['id','usuario','senha'])
            ->where('usuario', $email)->get()->first();

        if ($usuario) {
            if (crypt($senha, $usuario->senha) == $usuario->senha) {
                $_SESSION['usuario'] = [
                    'id' => $usuario->id,
                    'nome' => $usuario->usuario
                ];
                return redirect("admin.agentes");
            }
        }

        return view('admin.login');
    }
}
