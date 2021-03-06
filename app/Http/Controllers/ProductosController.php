<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Productos;
use App\Inventario;

 
class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos=Productos::orderBy('id','DESC')->simplePaginate(5);
        return view('Productos.index',compact('productos')); 
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Productos.create');
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
        $this->validate($request,[ 'nombre'=>'required', 'descripcion'=>'required']);
        Productos::create($request->all());


        return redirect()->route('productos_index')->with('success','Registro creado satisfactoriamente');
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

        $producto=Productos::find($id);
        $inv=Inventario::find($id);
        if ( $producto or $inv) {
         // Si el producto tiene inventario y/o ventas no se puede eliminar
         return redirect()->route('productos_index', ['id' => $id])->with('success','El producto no puede ser eliminado ya que presenta inventario o ventas activas');

        }else{

            Productos::find($id)->delete();
            return redirect()->route('productos_index')->with('success','Registro eliminado satisfactoriamente');
        
        }

       
    
    
    }
}