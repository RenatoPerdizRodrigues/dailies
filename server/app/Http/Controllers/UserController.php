<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    /**
     * Construtor com autenticação
     */
    public function __construct(){
        $this->middleware('auth:api');
    }

    /**
     * Retorna a lista de usuários
     * 
     * @return json
     */
    public function index(){
        if($users = User::paginate(5)){
            return response()->json(['users' => $users, 'message' => 'Usuários capturados com sucesso'], 201);
        } else {
            return response()->json(['message' => 'Usuário não encontrado'], 401);
        }
    }

    /**
     * Armazena um usuário
     * @param Request $request
     * @return json
     */
    public function store(Request $request){
        /**
         * Validação
         */
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8',
        ]);

        try {
            $user = User::create($request->json()->all());
            return response()->json(['user' => $user, 'message' => 'Criado com sucesso!'], 202);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Falha:' . $e->getMessage()], 401);
        }
    }

    /**
     * Retorna um usuário específico
     * @param $id
     * @return json
     */
    public function show($id){
        if($user = User::find($id)){
            return response()->json(['user' => $user, 'message' => 'Usuário capturado com sucesso!'], 201);
        } else {
            return response()->json(['message' => 'Usuário não encontrado'], 401);
        }
    }

    /**
     * Atualiza um usuário específico
     * @param Request $request, $id
     * @return json 
     */
    public function update(Request $request, $id){
        if($user = User::find($id)){
            /**
             * Validação
             */
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => "required|email|max:255|unique:users,email,".$id,
                'password' => 'required|min:8',
            ]);

            $user->update($request->json()->all());
            return response()->json(['user' => $user, 'message' => 'Usuário atualizado com sucesso!'], 203);
        } else {
            return response()->json(['message' => 'Usuário não encontrado'], 401);
        }
    }
}