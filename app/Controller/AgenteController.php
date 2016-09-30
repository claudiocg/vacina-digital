<?php

namespace App\Controller;

use App\Model\Agente;
use App\Model\Usuario;

class AgenteController
{
    public function index()
    {
        $agentes = Agente::select()->get()->usuario()->all();

        return view('agente.index', ['agentes' => $agentes]);
    }
    public function create()
    {
        return view('agente.create');
    }
    public function store()
    {
        $usuario = new Usuario;

        $usuario->username = $_POST['usuario'];
        $usuario->senha = crypt($_POST['senha']);
        $usuario->tipo = 2;

        $usuario = $usuario->save();

        $agente = new Agente;

        $agente->nome = $_POST['nome']; 
        $agente->cpf = $_POST['cpf'];
        $agente->estado = $_POST['estado'];
        $agente->cidade = $_POST['cidade'];
        $agente->id_usuario = $usuario->id;

        $agente->save();

        header("location: /agentes");
    }
    public function show()
    {
        $agente = Agente::find(request('id'))->usuario();

        return view('agente.show', ['agente' => $agente]);
    }
    public function edit()
    {
        $agente = Agente::find($_GET['id'])->usuario();

        return view('agente.edit', ['agente' => $agente]);
    }
    public function update()
    {
        $agente = Agente::find($_GET['id']);

        $agente->nome = $_POST['nome'];
        $agente->cpf = $_POST['cpf'];
        $agente->estado = $_POST['estado'];
        $agente->cidade = $_POST['cidade'];

        $agente->updateAgente($agente);

        $usuario = $agente->usuario()->usuario;
        $usuario->username = $_POST['usuario'];
        $usuario->senha = $_POST['senha'];
        $usuario->tipo = $_POST['tipo'];
        $usuario->perm = $_POST['perm'];

        $agente->updateUsuario($usuario);

        header("location: /agentes");
    }
    public function destroy()
    {
    }
}
