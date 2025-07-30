<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Establishment;

class EstablishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $establisment = new Establishment();
        $establisment = $establisment->getAllEstablishment();
        return $establisment;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Crie um novo registro
        $establisment = new Establishment();
        $establisment = $establisment->createEstablishment($request->all());

        // Verifique se a inserção foi bem-sucedida
        if ($establisment) {
            return response()->json(['message' => 'Registro criado com sucesso', 'data' => $establisment], 201);
        } else {
            return response()->json(['message' => 'Falha ao criar o registro'], 500); // Código de erro HTTP 500 - Internal Server Error
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $establisment = new Establishment();
        $establisment = $establisment->getEstablishmentById($id);
        return $establisment;
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
        $establisment = new Establishment();
        $establisment = $establisment->updateEstablishment($id, $request->all());

        // Verifique se a inserção foi bem-sucedida
        if ($establisment) {
            return response()->json(['message' => 'Registro atualizado com sucesso', 'data' => $establisment], 201);
        } else {
            return response()->json(['message' => 'Falha ao atualizar o registro'], 500); // Código de erro HTTP 500 - Internal Server Error
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Tente encontrar o registro a ser excluído
        $establisment = new Establishment();
        $establisment = $establisment->getEstablishmentById($id);

        // Verifique se o registro existe
        if (!$establisment) {
            return response()->json(['message' => 'Registro não encontrado'], 404); // Código de status HTTP 404 - Not Found
        }

        // Tente excluir o registro
        if ($establisment->deleteEstablishment($id)) {
            return response()->json(['message' => 'Registro excluído com sucesso'], 200); // Código de status HTTP 200 - OK
        } else {
            return response()->json(['message' => 'Falha ao excluir o registro'], 500); // Código de status HTTP 500 - Internal Server Error
        }
    }
}
