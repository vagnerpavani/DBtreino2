<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Http\Resources\ClientesResource;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cliente::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente;
        
        $cliente->nome = $request->nome;
        $cliente->endereco =$request->endereco;
        $cliente->numeroDoCartao=$request->numeroDoCartao;
        $cliente->codigoDeSeguranca =$request->codigoDeSeguranca;
        $cliente->save();
        return response()->json([$cliente]);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $cliente = Cliente::findOrFail($id);
        return new ClientesResource($cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        
        $cliente = Client::find($id);
        if($request->has('nome'))$cliente->nome = $request->nome;
        if($request->has('endereco'))$cliente->endereco = $request->endereco;
        if($request->has('numeroDoCartao'))$cliente->numeroDoCartao = $request->numeroDoCartao;
        if($request->has('codigoDeSeguranca'))$cliente->codigoDeSeguranca = $request->codigoDeSeguranca;
        $cliente->save();
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
        Cliente::destroy($id);
        return response()->json(['Cliente deletado.']);
    }
}
