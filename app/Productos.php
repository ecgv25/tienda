<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $fillable = ['id', 'nombre', 'codigo' ,'descripcion'];

     /**
	* Get data Inventario
	*/
	public function Inventario()
	{
		return $this->hasMany('Inventario', 'idProducto');
	}

}
