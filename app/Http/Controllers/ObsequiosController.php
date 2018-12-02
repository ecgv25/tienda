<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Ventas;
use App\Inventario;
use App\Obsequios;
use Illuminate\Support\Facades\DB;


use App\Exports\ProductosObsequiosExport;
use App\Imports\VentasImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
 
class ObsequiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $obsequios= Obsequios::orderBy('id','DESC')->paginate(10);

        return view('Obsequios.index',compact('obsequios')); 
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        $productos = DB::table('productos')->get();

        
        return view('Obsequios.new',compact('productos'));
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        if ($request->isMethod('post')) {
            $productos = $request->get('productos_hidden');
            $cantidadesTotal = 0;
            $MontoTotal = 0;
            foreach($productos as $key => $producto):

                $cantidadesTotal +=$request->get('cantidades_hidden')[$key];
                $MontoTotal +=$request->get('costos_totales_hidden')[$key];
            endforeach;
  //registrar el obsequio

            DB::table('obsequios')->insert([
                'idProducto' => $producto,
                'nameRecibe' => $request->get('nombreRecibe'),
                'nameAutoriza' =>  $request->get('nombreAutoriza'),
                'cedulaAutoriza' => $request->get('cedulaAutoriza'),
                'cantidad' => $cantidadesTotal,
                'costoPetros' => $MontoTotal,
                
                

             ]); 
          
            foreach($productos as $key => $producto):
                $cantidad = $request->get('cantidades_hidden')[$key];
                $costoUnitario = $request->get('costos_unitarios_hidden')[$key];
                $costoTotal = $request->get('costos_totales_hidden')[$key];

               
  //registrar el movimiento
                $observacion = 'Obsequio de producto';
                DB::table('movimientos_inventario')->insert([
                    'idProducto' =>  $producto,
                    'observacion' =>  $observacion,
                    'idTipoMovimiento' => '4',
                    ]);
  //registrar los productos asociados al obsequio
   $obsequios  = Obsequios::orderby('created_at','DESC')->take(1)->first();
   $idObsequios = $obsequios->id;
                    DB::table('productos_obsequios')->insert([
                        'idObsequio' => $idObsequios,
                        'idProducto' =>  $producto,
                        'cantidad' =>  $cantidad,
                        'montoUnitario' => $costoUnitario,
                        ]);
  

                //actualizar la cantidad del producto en el inventario
                $productosInv = Inventario::where('idProducto', '=', $producto)->first();
                
                $cantidadActual = $productosInv->cantidad -$request->get('cantidades_hidden')[$key];
                          
                //hacer el update con los nuevos campos
                $mod_cantidad_inventario = Inventario::where("idProducto", "=",  $producto)
                                                       ->update(array("cantidad" => $cantidadActual,
                                                               ));
            endforeach;
        }

        $obsequios=Obsequios::orderBy('id','DESC')->paginate(10);
    //return view('Obsequios.index',compact('obsequios')); 
        return redirect()->route('obsequios_index')->with('success','Registro creado satisfactoriamente');
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


    public function verificarReferenciasCryptos() {
        $tipoMoneda = $_GET['tipoMoneda'];

        if($tipoMoneda == 'btc') {
		    $urlApi = "https://min-api.cryptocompare.com/data/pricehistorical?fsym=BTC&tsyms=USD";
		} elseif ($tipoMoneda == 'eth') {
			$urlApi = "https://min-api.cryptocompare.com/data/pricehistorical?fsym=ETH&tsyms=USD";
		} elseif ($tipoMoneda == 'ltc') {
			$urlApi = "https://min-api.cryptocompare.com/data/pricehistorical?fsym=LTC&tsyms=USD";
		} elseif ($tipoMoneda == 'dash') { 
			$urlApi = "https://min-api.cryptocompare.com/data/pricehistorical?fsym=DASH&tsyms=USD";
        }

        $headers = [
            'Content-Type: application/x-www-form-urlencoded; charset=utf-8'
        ];


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlApi);
        // SSL important
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $output = curl_exec($ch);
        curl_close($ch);


        return $output;      
    }
    public function export() 
    {
        return Excel::download(new ProductosObsequiosExport, 'obsequios.xlsx');
    }
    
    public function import() 
    {
        return Excel::import(new ProductosObsequiosExport, 'users.xlsx');
    }
 
}