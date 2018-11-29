<?php

namespace App\Exports;

use App\Obsequios;
use App\ProductosObsequios;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Exports\ProductosObsequiosExport;
use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

//class Export implements FromCollection
class ProductosObsequiosExport implements FromView
{
    public function view(): View
    {



        $productosObsequios = ProductosObsequios::orderBy('id','DESC')->paginate(1000);


        return view('Obsequios.reporte',compact('productosObsequios')); 
        
        
       // return view('Ventas.reporte', [
        //    'ventas' => Ventas::all()
        //]);
    }
}
 