<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Cuenta;
use App\Models\Provedor;
use Illuminate\Http\Request;

/**
 * Class PagoController
 * @package App\Http\Controllers
 */
class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagos = Pago::paginate();

        return view('pago.index', compact('pagos'))
            ->with('i', (request()->input('page', 1) - 1) * $pagos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pago = new Pago();
        $user = \Auth::user();
        $pago->user_id = $user->id;
        // $provedores =Provedor::pluck('nombre','id' );
        $provedores = Provedor::all();
        return view('pago.create', compact('pago', 'provedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pago::$rules);

        $pago = Pago::create($request->all());

        return redirect()->route('pagos.index')
            ->with('success', 'Pago created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pago = Pago::find($id);

        return view('pago.show', compact('pago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pago = Pago::find($id);
        $provedores = Provedor::all();
        return view('pago.edit', compact('pago', 'provedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pago $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        request()->validate(Pago::$rules);

        $pago->update($request->all());

        return redirect()->route('pagos.index')
            ->with('success', 'Pago updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pago = Pago::find($id)->delete();

        return redirect()->route('pagos.index')
            ->with('success', 'Pago deleted successfully');
    }

    public function cuentas(Request $request)
    {
        if (isset($request->texto)) {
            $cuentas = Cuenta::whereprovedor_id($request->texto)->get();
            return response()->json(
                [
                    'lista' => $cuentas,
                    'success' => true
                ]
            );
        } else {
            return response()->json(
                [
                    'success' => false
                ]
            );
        }
    }
}