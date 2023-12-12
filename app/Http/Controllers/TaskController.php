<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with(['status', 'user'])->get();

        return view('pages.task_manager.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statusList = Status::all();
        $userList = User::all();
        return view('pages.task_manager.edit', compact('statusList', 'userList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->titulo = $request->input("titulo");
        $task->descricao = $request->input("descricao");
        $task->email_responsavel = $request->input("email_responsavel");
        $task->status_id = $request->input("status_id");        
        $task->save();
        $task->user()->sync($request->input("usuarios"));

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::with(['status', 'user'])->find($id);
        $statusList = Status::all();
        $userList = User::all();

        return view('pages.task_manager.edit', compact('task', 'statusList', 'userList'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);
        
        if(isset($task)){
            $task->titulo = $request->input("titulo");
            $task->descricao = $request->input("descricao");
            $task->email_responsavel = $request->input("email_responsavel");
            $task->status_id = $request->input("status_id");
            $task->user()->sync($request->input("usuarios"));
            $task->save();            
            
            return redirect()->route('tasks.index');
        }

        return response()->json('Tarefa não encontrado', 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        if(isset($task)) {
            $task->delete();
            return redirect()->route('tasks.index');
        }

        return response()->json('Tarefa não encontrado', 404);
    }
}
