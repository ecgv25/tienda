<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Ventas;
use App\Inventario;

use Illuminate\Support\Facades\DB;
 
class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ventas=Ventas::orderBy('id','DESC')->paginate(3);
        return view('Ventas.index',compact('ventas')); 
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        $productos = DB::table('productos')->get();

        return view('Ventas.new',compact('productos'));
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        if ($request->isMethod('post')) {
            $productos = $request->get('productos_hidden');

            foreach($productos as $key => $producto):
                $cantidad = $request->get('cantidades_hidden')[$key];
                $costoUnitario = $request->get('costos_unitarios_hidden')[$key];
                $costoTotal = $request->get('costos_totales_hidden')[$key];

                $observacion = 'venta de producto';
                DB::table('movimientos_inventario')->insert([
                    'idProducto' =>  $producto,
                    'observacion' =>  $observacion,
                    'idTipoMovimiento' => '2',
                    ]);

                    DB::table('productos_ventas')->insert([
                        'idVenta' =>  1,
                        'idProducto' =>  3,
                        'cantidad' => '2',
                        'montoUnitario' => '2',
                        ]);

                     
            endforeach;

            DB::table('ventas')->insert([
                'monto' =>  '1222',
                'idCliente' => '1',
                'idVendedor' => '1',
             
                ]); 
        }

        $ventas=Ventas::orderBy('id','DESC')->paginate(3);
        return view('Ventas.index',compact('ventas')); 
    }

    /**
     * Ajax para verificar el costo del producto en el inventario
     */
    public function costoProducto() {
        $productoId = $_GET['id'];

        $producto = Inventario::where('idProducto', '=', $productoId)->first();
        
        if($producto){
            if($producto->cantidad > 0) {
                $message = '';
            } else {
                $message = 'No se poseen cantidades disponibles para la venta.';
                $producto = null;
            }
        } else {
            $message = 'No se posee el producto en el inventario.';
            $producto = null;
        }

        $data['message'] = $message;
        $data['producto'] = $producto;
        return response()->json($data);  
    }
 
}