<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposMovimientos extends Model
{
    protected $fillable = ['id', 'nombre', 'suma_resta'];

    public function MovimientosInventario()
    {
        return $this->belongsTo('InventMovimientosInventarioario', 'idTipoMovimiento');
    }

}
