<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $fillable = ['id', 'idProducto', 'cantidad' ,'costoDivisas','costoPetros','ganancia',];
   
   
    /**
	* Get data Productos
	*/
	public function productos()
	{
        return $this->belongsTo('App\Productos','idProducto');
	}
}
