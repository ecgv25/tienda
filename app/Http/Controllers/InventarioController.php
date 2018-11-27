<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Inventario;
use App\Productos;
use Illuminate\Support\Facades\DB;


 
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
        $inventario=Inventario::orderBy('id','DESC')->paginate(3);

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
       // $this->validate($request,[ 'producto'=>'required', 'cantidad'=>'required', 'costo'=>'required']);
        Inventario::create($request->all());
        $observacion = 'se agrego producto al inventario';
        DB::table('movimientos_inventario')->insert([
            'idProducto' =>  $request['idProducto'],
            'observacion' =>  $observacion,
            'idTipoMovimiento' => '1',
            ]);
		 
      
        
        
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
       
        $producto=Productos::find($id);

        return view('Productos.edit',compact('producto'));
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
        $this->validate($request,[ 'nombre'=>'required', 'codigo'=>'required', 'descripcion'=>'required']);
 
        Productos::find($id)->update($request->all());
        return redirect()->route('productos_index')->with('success','Registro actualizado satisfactoriamente');
 
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
        Productos::find($id)->delete();
        return redirect()->route('productos_index')->with('success','Registro eliminado satisfactoriamente');
    }
}