<?php

namespace App\Model;

use Framework\Database\Model;

class Agente extends Model
{
    public function usuario()
    {
        return $this->hasOne('App\Usuario', 'id', 'id_usuario');
    }
}
