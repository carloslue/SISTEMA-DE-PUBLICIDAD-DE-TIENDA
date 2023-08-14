<?php

namespace App\Http\Controllers;
//se agrego el request ya que se va a utilizar para hacer busqueda
use Illuminate\Http\Request;
use App\Producto;
use Illuminate\Support\Facades\DB;



class ProductoClientController extends Controller
{

    public function index(Request $request)
    {

        $buscar = $request->input('palabra');
        $productos = DB::table('productos')
            ->join('categorias', 'categorias.id', '=', 'productos.categoriaid')
            ->join('estadopromociones', 'estadopromociones.id', '=', 'productos.estadopromocionid')
            ->select('productos.*', 'categorias.descripcion_categoria', 'estadopromociones.estado')
            ->Where('nombre', 'LIKE', '%' . $buscar . '%')
            ->get();

        return view('usuariop.productosp.index', compact('productos', 'buscar'))->with('i', (request()->input('page', 1) - 1));
    }



    //METODO VER
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('usuariop.productosp.show', compact('producto'));
    }
}
