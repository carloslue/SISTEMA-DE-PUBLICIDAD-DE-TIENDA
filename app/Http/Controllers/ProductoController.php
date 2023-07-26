<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use App\Estadopromocione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $productos = Producto::paginate();
        $productos = DB::table('productos')
        ->join('categorias', 'categorias.id', '=', 'productos.categoriaid')
        ->join('estadopromociones', 'estadopromociones.id', '=', 'productos.estadopromocionid')
        ->select('productos.*', 'categorias.descripcion_categoria','estadopromociones.estado')
        ->get();

        return view('producto.index', compact('productos'))->with('i', (request()->input('page', 1) - 1));
    }

    
    public function create()
    {
        $categorias=categoria::all();
        $estadopromociones=estadopromocione::all();
        $producto = new Producto();
        return view('producto.create', compact('producto','categorias','estadopromociones'));
    }

  
    public function store(Request $request)
    {
        request()->validate(Producto::$rules);
        $producto = new Producto();
        if ($request->hasFile('imagen')) {
            $file = $request->imagen;
            $file->move(public_path() . '/imagenestienda', 
            $file->getClientOriginalName());
            $producto->imagen = $file->getClientOriginalName();
        }
        $producto->nombre = request('nombre');
        $producto->descripcion = request('descripcion');
        $producto->precio = request('precio');
        $producto->categoriaid = request('categoriaid');
        $producto->estadopromocionid = request('estadopromocionid');
        $producto->Precio_promocion = request('Precio_promocion');
        $producto->save();

        return redirect()->route('productos.index')
            ->with('success', 'Producto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        request()->validate(Producto::$rules);

        $producto->update($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }
}
