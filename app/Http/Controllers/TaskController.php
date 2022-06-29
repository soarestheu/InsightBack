<?php

namespace App\Http\Controllers;

use App\Task;
;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = Task::where('user_id', '=', $this->getIdUserAuth())->orderBy('id')->get();

        return $task;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $this->getIdUserAuth();

        $task = new Task;
        $task->nome = $request->nome;
        $task->data_conclusao = $request->data_conclusao;
        $task->user_id = $this->getIdUserAuth();
        $task->status = false;
        if($task->save()){
            return response()->json(["sucess" => "Tarefa criada com sucesso"]);
        }else{
            return response()->json(["error" => "Erro ao criar tarefa"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Task::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
            $data = $request->only(['nome', 'data_conclusao']);
            $task = Task::where('id', $id)->update($data);
    
            if($task){
                return response()->json(["sucess" => "Tarefa atualizada com sucesso."]);
            }else{
                return response()->json(["error" => "Erro ao atualizar tarefa."]);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if( Task::where('id', $id)->delete() ) {
            return response()->json(["sucess" => "Tarefa deletada com sucesso."]);
        }else{
            return response()->json(["error" => "Erro ao deletar tarefa."]);
        }
    }

    public function changeStatus(Request $request)
    {

        $task = Task::find($request->id);
        $task->status = !$task->status;
        $task->save();
        
        return $task; 
    }

    private function getIdUserAuth()
    {
        return Auth()->id();
    } 
}
