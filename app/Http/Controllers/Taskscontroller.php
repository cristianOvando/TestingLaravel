<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;

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
        $task->category_id = $request->category_id;
        $task->save();

        return redirect()->route('tasks')->with('success', 'Tarea creada correctamente');
    }

    public function index(){
        $tasks = Task ::all();
        $categories = Category::all();
        return view('tasks.index', ['tasks' => $tasks, 'categories' => $categories]);
    }

    public function show($id){
        $task = Task::find($id);
        return view('tasks.show', ['task' => $task]);
    }

    public function update(Request $request, $id){
        $task = Task::find($id);
        $task->title = $request->title;
        $task->save();
        //return view('tasks.index', ['success' => 'updated task']);
        return redirect()->route('tasks')->with('success','updated task!');
    }

    public function destroy($id){
      $task = Task::find($id);
      $task->delete();
      return redirect()->route('tasks')->with('success','delete task!');
    }

}
