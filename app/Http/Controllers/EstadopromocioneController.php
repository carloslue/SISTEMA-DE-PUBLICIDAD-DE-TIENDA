<?php

namespace App\Http\Controllers;

use App\Estadopromocione;
use Illuminate\Http\Request;

/**
 * Class EstadopromocioneController
 * @package App\Http\Controllers
 */
class EstadopromocioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadopromociones = Estadopromocione::paginate();

        return view('estadopromocione.index', compact('estadopromociones'))
            ->with('i', (request()->input('page', 1) - 1) * $estadopromociones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estadopromocione = new Estadopromocione();
        return view('estadopromocione.create', compact('estadopromocione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Estadopromocione::$rules);

        $estadopromocione = Estadopromocione::create($request->all());

        return redirect()->route('estadopromociones.index')
            ->with('success', 'Estadopromocione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estadopromocione = Estadopromocione::find($id);

        return view('estadopromocione.show', compact('estadopromocione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estadopromocione = Estadopromocione::find($id);

        return view('estadopromocione.edit', compact('estadopromocione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Estadopromocione $estadopromocione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estadopromocione $estadopromocione)
    {
        request()->validate(Estadopromocione::$rules);

        $estadopromocione->update($request->all());

        return redirect()->route('estadopromociones.index')
            ->with('success', 'Estadopromocione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estadopromocione = Estadopromocione::find($id)->delete();

        return redirect()->route('estadopromociones.index')
            ->with('success', 'Estadopromocione deleted successfully');
    }
}
