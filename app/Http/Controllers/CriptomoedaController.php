<?php

namespace App\Http\Controllers;

use App\Models\criptomoeda;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


class CriptomoedaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regBook = Criptomoedas::All();
        $contador = $regBook->count();

        return Response()->json($regBook);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'sigla' => 'required',
            'nome' => 'required',
            'valor' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Registros inválidos',
                'errors' => $validator->errors()
            ],400);
        }

        $registros = criptomoeda::create($request->all());
        
        if($registros) {
            return response()->json([
                'success' => true,
                'message' => 'Criptomoeda cadastrada com sucesso!',
                'data' => $registros
            ],201);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao cadstrar a criptomoeda'
            ],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(criptomoeda $criptomoeda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, criptomoeda $criptomoeda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(criptomoeda $criptomoeda)
    {
        //
    }
}
