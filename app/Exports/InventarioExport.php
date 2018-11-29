<?php

namespace App\Exports;

use App\Inventario;
use App\Productos;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Exports\InventarioExport;
use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

//class Export implements FromCollection
class InventarioExport implements FromView
{
    public function view(): View
    {



        $inventario= Inventario::orderBy('id','DESC')->paginate(1000);


        return view('Inventario.reporte',compact('inventario')); 
        
        
       // return view('Ventas.reporte', [
        //    'ventas' => Ventas::all()
        //]);
    }
}
 