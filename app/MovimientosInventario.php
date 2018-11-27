<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientosInventario extends Model
{
    protected $fillable = ['id', 'idTipoMovimiento', 'idProducto' ,'observacion'];

    /**
	* Get data Productos
	*/
	public function Productos()
	{
		return $this->hasMany('Productos', 'idProducto');
    }
    /**
	* Get data Productos
	*/
	public function TiposMovimientos()
	{
		return $this->hasMany('TiposMovimientos', 'idTipoMovimiento');
	}
}
