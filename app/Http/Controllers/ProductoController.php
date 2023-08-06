<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use App\Estadopromocione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ProductoController extends Controller
{

    public function index()
    {
        // $productos = Producto::paginate();
        $productos = DB::table('productos')
            ->join('categorias', 'categorias.id', '=', 'productos.categoriaid')
            ->join('estadopromociones', 'estadopromociones.id', '=', 'productos.estadopromocionid')
            ->select('productos.*', 'categorias.descripcion_categoria', 'estadopromociones.estado')
            ->get();

        return view('producto.index', compact('productos'))->with('i', (request()->input('page', 1) - 1));
    }


    public function create()
    {
        $categorias = categoria::all();
        $estadopromociones = estadopromocione::all();
        $producto = new Producto();
        return view('producto.create', compact('producto', 'categorias', 'estadopromociones'));
    }


    public function store(Request $request)
    {
        request()->validate(Producto::$rules);
        $producto = new Producto();
        if ($request->hasFile('imagen')) {
            $file = $request->imagen;
            $file->move(
                public_path() . '/imagenestienda',
                $file->getClientOriginalName()
            );
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

    //METODO VER
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    //METODO DE EDITAR
    public function edit($id)
    {
        $categorias = categoria::all();
        $estadopromociones = estadopromocione::all();
        $producto = Producto::find($id);

        return view('producto.edit', compact('producto', 'categorias', 'estadopromociones'));
    }

    //METODO DE ACTUALIZAR
    public function update(Request $request, $id)
    {
        request()->validate(Producto::$rules);
        $producto = Producto::find($id);
        if ($request->hasFile('imagen')) {
            $file = $request->imagen;
            $file->move(
                public_path() . '/imagenestienda',
                $file->getClientOriginalName()
            );
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
            ->with('success', 'Producto actualizado exitosamente');
    }


    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }
}
