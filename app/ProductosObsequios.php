<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosObsequios extends Model
{
     /**
	* Get data Productos
	*/
	public function productos()
	{
        return $this->belongsTo('App\Productos','idProducto');
    }
     /**
	* Get data Obsequios
	*/
	public function obsequios()
	{
        return $this->belongsTo('App\Obsequios','idObsequio');
	}
}
