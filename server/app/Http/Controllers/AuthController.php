<?php
    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;

    class AuthController extends Controller {

        /**
         * Recupera um JWT por credenciais
         */
        public function login(Request $request){
            //Valida
            $this->validate($request, [
                'email' => 'required',
                'password' => 'required'
            ]);

            //Captura as credenciais
            $credentials = $request->only(['email', 'password']);

            if (! $token = Auth::attempt($credentials)) {
                return response()->json(['message' => 'Não autorizado!'], 401);
            }
    
            return $this->respondWithToken($token);
        }

    }