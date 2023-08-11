<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Support\Facades\DB;



class ProductoClientController extends Controller
{

    public function index()
    {
        // $productos = Producto::paginate();
        $productos = DB::table('productos')
            ->join('categorias', 'categorias.id', '=', 'productos.categoriaid')
            ->join('estadopromociones', 'estadopromociones.id', '=', 'productos.estadopromocionid')
            ->select('productos.*', 'categorias.descripcion_categoria', 'estadopromociones.estado')
            ->get();

        return view('usuariop.productosp.index', compact('productos'))->with('i', (request()->input('page', 1) - 1));
    }


    //METODO VER
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }
}
