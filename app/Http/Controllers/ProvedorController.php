<?php

namespace App\Http\Controllers;

use App\Models\Provedor;
use Illuminate\Http\Request;

/**
 * Class ProvedorController
 * @package App\Http\Controllers
 */
class ProvedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provedors = Provedor::paginate();

        return view('provedor.index', compact('provedors'))
            ->with('i', (request()->input('page', 1) - 1) * $provedors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provedor = new Provedor();
        return view('provedor.create', compact('provedor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Provedor::$rules);

        $provedor = Provedor::create($request->all());

        return redirect()->route('provedors.index')
            ->with('success', 'Provedor created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provedor = Provedor::find($id);

        return view('provedor.show', compact('provedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provedor = Provedor::find($id);

        return view('provedor.edit', compact('provedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Provedor $provedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provedor $provedor)
    {
        request()->validate(Provedor::$rules);

        $provedor->update($request->all());

        return redirect()->route('provedors.index')
            ->with('success', 'Provedor updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $provedor = Provedor::find($id)->delete();

        return redirect()->route('provedors.index')
            ->with('success', 'Provedor deleted successfully');
    }
}
