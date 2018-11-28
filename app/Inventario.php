<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $fillable = ['id', 'idProducto', 'cantidad' ,'costoDivisas','costoPetros'];
   
   
    /**
	* Get data Productos
	*/
	public function Productos()
	{
		return $this->hasMany('Productos', 'idProducto');
	}
}
