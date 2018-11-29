<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosVentas extends Model
{
    /**
	* Get data Productos
	*/
	public function productos()
	{
        return $this->belongsTo('App\Productos','idProducto');
    }
     /**
	* Get data Ventas
	*/
	public function ventas()
	{
        return $this->belongsTo('App\Ventas','idVenta');
	}
}
