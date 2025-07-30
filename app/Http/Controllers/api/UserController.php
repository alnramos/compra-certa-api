<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new User();
        $user = $user->getAllUser();
        return $user;
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
        $user = new User();
        $user = $user->createUser($request->all());

        // Verifique se a inserção foi bem-sucedida
        if ($user) {
            return response()->json(['message' => 'Registro criado com sucesso', 'data' => $user], 201);
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
        $user = new User();
        $user = $user->getUserById($id);
        return $user;
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
        $user = new User();
        $user = $user->updateUser($id, $request->all());

        // Verifique se a inserção foi bem-sucedida
        if ($user) {
            return response()->json(['message' => 'Registro atualizado com sucesso', 'data' => $user], 201);
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
        $user = new User();
        $user = $user->getUserById($id);

        // Verifique se o registro existe
        if (!$user) {
            return response()->json(['message' => 'Registro não encontrado'], 404); // Código de status HTTP 404 - Not Found
        }

        // Tente excluir o registro
        if ($user->deleteUser($id)) {
            return response()->json(['message' => 'Registro excluído com sucesso'], 200); // Código de status HTTP 200 - OK
        } else {
            return response()->json(['message' => 'Falha ao excluir o registro'], 500); // Código de status HTTP 500 - Internal Server Error
        }
    }
}
