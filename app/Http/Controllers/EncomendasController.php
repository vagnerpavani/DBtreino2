<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encomenda;

class EncomendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Encomenda::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $encomenda = new Encomenda;
        
        $encomenda->formaDePagamento = $request->formaDePagamento;
        $encomenda->idCliente = $request->idCliente;
        $encomenda->idProduto = $request->idProduto;
        $encomenda->save();
        return response()->json([$encomenda]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $encomenda = Encomenda::findOrFail($id);
        return response()-> json([$encomenda]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $encomenda = Encomenda::find($id);
    
        if($request->has('formaDePagamento') ) $encomenda->formaDePagamento = $request->formaDePagamento;
        if($request->has('idCliente') ) $encomenda->idCliente =$request->idCliente;
        if($request->has('idProduto') ) $encomenda->idProduto =$request->idProduto;
        $encomenda->save();
    
        return response()->json([$cliente]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Encomenda::destroy($id);
        return response()->json('Encomenda deletada');
    }
}
