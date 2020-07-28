<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPedido extends Model
{
    protected $table = 'pedido';
    protected $fillable=['sabor', 'id_user', 'quantidade', 'price'];

    public function relUsers()
    {
        return $this->hasOne('App\User','id','id_user');
    }
}