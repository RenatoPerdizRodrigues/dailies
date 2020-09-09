<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Daily;

class DailyController extends Controller {
    
    /**
     * Construtor com autenticação
     */
    public function __construct(){
        $this->middleware('auth:api');
    }

    /**
     * Retorna uma listagem de index com data de início ou fim opcionais?
     */
    public function index(){
        if($dailies = Daily::where('user_id',Auth::id())->get()){
            return response()->json(['daily' => $dailies, 'message' => 'Dailies encontradas com sucesso!'], 200);
        } else {
            return response()->json(['message' => 'Dailies não encontradas!'], 400);
        }
    }

    /**
     * Retorna uma daily específica por ID
     * @param id
     */
    public function show($date = null){
        if($daily = $date == null ? Daily::where('user_id',Auth::id())->where('date',date('Y-m-d'))->with('tasks')->get() : Daily::where('user_id',Auth::id())->where('date',$date)->with('tasks')->get()){
            return response()->json(['daily' => $daily, 'message' => 'Daily encontrada com sucesso!'], 200);
        } else {
            return response()->json(['message' => 'Daily não encontrada!'], 400);
        }
    }

    /**
     * Bota a task como feita
     * @param daily_id
     * @param task_id
     */
    public function done(){

    }

    /**
     * Copia a task para outra daily
     */
    public function copy(){
        
    }
}