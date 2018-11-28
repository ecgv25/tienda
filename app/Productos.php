<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $fillable = ['id', 'nombre', 'codigo' ,'descripcion'];



    public function Inventario()
    {
        return $this->belongsTo('Inventario', 'idProducto');
    }

}
