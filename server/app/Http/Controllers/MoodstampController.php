<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Moodstamp;

class MoodstampController extends Controller {
    
    /**
     * Cria uma nova moodstamp com base na request
     */
    public function store(Request $request){
        /**
         * Validação
         */
        $this->validate($request, [
            'mood' => 'required',
            'description' => 'required',
        ]);

        try {
            $moodstamp = Moodstamp::create($request->json()->all());
            return response()->json(['moodstamp' => $moodstamp,'message' => 'Moodstamp criada com sucesso!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro: ' . $e->getMessage()], 400);
        }
    }
}