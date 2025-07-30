<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase = new Purchase();
        $purchase = $purchase->getAllPurchase();
        return $purchase;
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
        $purchase = new Purchase();
        $purchase = $purchase->createPurchase($request->all());

        // Verifique se a inserção foi bem-sucedida
        if ($purchase) {
            return response()->json(['message' => 'Registro criado com sucesso', 'data' => $purchase], 201);
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
        $purchase = new Purchase();
        $purchase = $purchase->getPurchaseById($id);
        return $purchase;
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
        $purchase = new Purchase();
        $purchase = $purchase->updatePurchase($id, $request->all());

        // Verifique se a inserção foi bem-sucedida
        if ($purchase) {
            return response()->json(['message' => 'Registro atualizado com sucesso', 'data' => $purchase], 201);
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
        $purchase = new Purchase();
        $purchase = $purchase->getPurchaseById($id);

        // Verifique se o registro existe
        if (!$purchase) {
            return response()->json(['message' => 'Registro não encontrado'], 404); // Código de status HTTP 404 - Not Found
        }

        // Tente excluir o registro
        if ($purchase->deletePurchase($id)) {
            return response()->json(['message' => 'Registro excluído com sucesso'], 200); // Código de status HTTP 200 - OK
        } else {
            return response()->json(['message' => 'Falha ao excluir o registro'], 500); // Código de status HTTP 500 - Internal Server Error
        }
    }


    public function getRegistroCompra()
    {
        $purchase = new Purchase();
        $purchase = $purchase->getRegistro();
        return $purchase;

    }
    public function getRegistroCompraByUser($idUser)
    {
        $purchase = new Purchase();
        $purchase = $purchase->getRegistroByUser($idUser);
        return $purchase;
    }
}
