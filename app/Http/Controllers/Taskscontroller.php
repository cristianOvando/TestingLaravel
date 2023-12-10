<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    /**
    * index para mostrar todos los todos
    * store para guardar un todo
    * update para actualizar un todo
    * destroy para eliminar un todo
    * edit para mostrar el formulario de edición
    */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3'
        ]);
        $task = new Task;
        $task->title = $request->title;
        $task->save();

        return redirect()->route('tasks')->with('success', 'Tarea creada correctamente');
    }

}
