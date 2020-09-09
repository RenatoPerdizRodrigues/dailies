<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Daily;

class TaskController extends Controller {
    
    /**
     * Construtor com autenticação
     */
    public function __construct(){
        $this->middleware('auth:api');
    }

    /**
     * Salva uma nova task
     * @param Request
     */
    public function store(Request $request){
        /**
         * Validação
         */
        $this->validate($request, [
            'name' => 'required',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s',
            'reminder' => 'date_format:H:i:s',
            'date' => 'date_format:d/m/Y'
        ]);

        try {
            $task = Task::create($request->json()->all());

            $request->merge(['task_id' => $task->id]);
            /**
             * Insere também uma nova Daily com a task criada, de acordo com a data recebida
             */
            $daily = Daily::create($request->json()->all());
            return response()->json(['task' => $task, 'daily' => $daily, 'message' => 'Task criada com sucesso!'], 400);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro: ' . $e->getMessage()], 400);
        }
    }


    /**
     * Retorna uma task específica
     * @param id
     */
    public function show($id){
        if($task = Task::find($id)){
            return response()->json(['task' => $task, 'message' => 'Task encontrada com sucesso!'], 200);
        } else {
            return response()->json(['message' => 'Task não encontrada!'], 400);
        }
    }

    /**
     * Atualiza uma task
     * @param Request
     */
    public function update(Request $request, $id){
        /**
         * Validação
         */
        $this->validate($request, [
            'name' => 'required',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s',
            'reminder' => 'date_format:H:i:s',
            'date' => 'date_format:d/m/Y'
        ]);

        try {
            $task = Task::find($id);
            $task->update($request->json()->all());
            return response()->json(['task' => $task, 'message' => 'Task atualizada com sucesso!'], 400);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro: ' . $e->getMessage()], 400);
        }
    }
}