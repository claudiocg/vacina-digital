<?php

namespace App\Controller\Admin;

use App\Model\Agente;
use App\Model\Usuario;
use Framework\Request;

class AgenteController
{
    public function index()
    {
        $agentes = Agente::select()->get()->usuario()->all();

        return view('admin.agente.index', ['agentes' => $agentes]);
    }
    public function create()
    {
        return view('admin.agente.create');
    }
    public function store(Request $request)
    {
        $usuario = new Usuario;

        $usuario->usuario = $request->post('usuario')['usuario'];
        $usuario->senha = crypt($request->post('usuario')['senha'], '');
        $usuario->tipo = 2;

        $usuario = $usuario->save();

        $agente = new Agente;

        $agente->id_usuario = $usuario->id;
        $agente->nome   = $request->post('agente')['nome']; 
        $agente->cpf    = number($request->post('agente')['cpf']);
        $agente->cep    = number($request->post('agente')['cep']);
        $agente->estado = $request->post('agente')['estado'];
        $agente->cidade = $request->post('agente')['cidade'];
        $agente->id_posto_vinculado = 1;

        $agente->save();

        return redirect("admin.agentes");
    }
    public function show(Request $request)
    {
        $agente = Agente::find($request->get('id'))->usuario();

        return view('admin.agente.show', ['agente' => $agente]);
    }
    public function edit(Request $request)
    {
        $agente = Agente::find($request->get('id'))->usuario();

        return view('admin.agente.edit', ['agente' => $agente]);
    }
    public function update(Request $request)
    {
        $agente = Agente::find($request->get('id'));

        $agente->nome   = $request->post('agente')['nome']; 
        $agente->cpf    = number($request->post('agente')['cpf']);
        $agente->cep    = number($request->post('agente')['cep']);
        $agente->estado = $request->post('agente')['estado'];
        $agente->cidade = $request->post('agente')['cidade'];
        $agente->id_posto_vinculado = 1;

        $agente->save();

        $usuario = $agente->usuario()->usuario;
        $usuario->usuario = $request->post('usuario')['usuario'];
        if ($request->post('usuario')['senha'] != null)
            $usuario->senha   = crypt($request->post('usuario')['senha'], '');
        $usuario->tipo    = 2;

        $usuario->save();

        return redirect("admin.agentes.{$usuario->id}");
    }
    public function destroy()
    {
    }
}
