<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Inventario;
use App\Productos;
use Illuminate\Support\Facades\DB;

use App\Exports\InventarioExport;
use App\Imports\VentasImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
 
class InventarioController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $inventario=Inventario::orderBy('id','DESC')->paginate(1000);

        return view('Inventario.index',compact('inventario')); 
    }
    /**
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        $productos = DB::table('productos')->get();

        return view('Inventario.new',compact('productos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      

        //
        return view('Inventario.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[ 'idProducto'=>'required', 'cantidad'=>'required']);
        $producto = Productos::where('id', '=', $request['id'])->first();

        $observacion = 'se agrego producto al inventario'.'cantidad:'.$request['cantidad'].'producto:' ;

        DB::table('movimientos_inventario')->insert([
            'idProducto' =>  $request['idProducto'],
            'observacion' =>  $observacion,
            'idTipoMovimiento' => '1',
            ]);


           //buscar la cantidad del producto
            $producto = Inventario::where('idProducto', '=', $request['idProducto'])->first();
            if($producto):
                    //hacer el update con los nuevos campos
                    $mod_cantidad_inventario = Inventario::where("idProducto", "=", $request['idProducto'])
                    ->update(array(
                        "cantidad" => $request['cantidad']+$producto->cantidad,
                    ));   
                else:
                    Inventario::create($request->all());
            endif;    


        return redirect()->route('inventario_index')->with('success','Registro creado satisfactoriamente');
    }
 
     /**
     * @return \Illuminate\Http\Response
     */
    public function ajuste()
    {
     

        $productos = DB::table('productos')->get();

        return view('Inventario.ajuste',compact('productos'));
    }    
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function retirarProductoInventario(Request $request)
    {
     

     
        DB::table('movimientos_inventario')->insert([
            'idProducto' =>  $request['idProducto'],
            'observacion' =>  $request['observacion'],
            'idTipoMovimiento' => '2',
            ]);


           //bucar la cantidad del producto
            $producto = Inventario::where('idProducto', '=', $request['idProducto'])->first();
            if($producto):
                $cantidad = $producto->cantidad - $request['cantidad'];
                    //hacer el update con los nuevos campos
                    $mod_cantidad_inventario = Inventario::where("idProducto", "=", $request['idProducto'])
                    ->update(array(
                        "cantidad" => $cantidad,
                    ));   
            endif;    


        return redirect()->route('inventario_index')->with('success','Registro creado satisfactoriamente');
    }  


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto=Productos::find($id);
        return  view('Productos.show',compact('Productos'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       
        $inv=Inventario::find($id);

        return view('Inventario.edit',compact('inv'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)    {
        //
       // $this->validate($request,[ 'nombre'=>'required', 'codigo'=>'required', 'descripcion'=>'required']);
 
        Inventario::find($id)->update($request->all());
        return redirect()->route('inventario_index')->with('success','Registro actualizado satisfactoriamente');
 
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Inventario::find($id)->delete();
        return redirect()->route('inventario_index')->with('success','Registro eliminado satisfactoriamente');
 
    }
    public function export() 
    {
        return Excel::download(new InventarioExport, 'inventario.xlsx');
    }
    
    public function import() 
    {
        return Excel::import(new InventarioExport, 'users.xlsx');
    }
}