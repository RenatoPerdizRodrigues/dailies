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

    public function store(Request $request){
        /**
         * Validação
         */
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        try {
            $user = User::create($request->json()->all());
            return response()->json(['user' => $user, 'message' => 'Criado com sucesso!'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Falha:' . $e->getMessage()], 401);
        }
    }

    public function show(){
        return response()->json(['user' => Auth::user()], 200);
    }
}