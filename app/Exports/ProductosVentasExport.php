<?php

namespace App\Exports;

use App\Ventas;
use App\ProductosVentas;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Exports\ProductosVentasExport;
use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

//class VentasExport implements FromCollection
class ProductosVentasExport implements FromView
{
    public function view(): View
    {



        $productosVentas = ProductosVentas::orderBy('id','DESC')->paginate(1000);


        return view('Ventas.reporte',compact('productosVentas')); 
        
        
       // return view('Ventas.reporte', [
        //    'ventas' => Ventas::all()
        //]);
    }
}
 