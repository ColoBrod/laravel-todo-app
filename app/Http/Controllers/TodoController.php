<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('welcome', ['todos' => $todos]);
    }

    public function store()
    {
        // Validation of request
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);
        Todo::create($attributes);
        return redirect('/');
    }

    // public function update(Request $req, $id)
    public function update(Todo $todo)
    {
        $todo->update(['isDone' => true]);
        // $todo = Todo::find($id);
        // $todo->isDone = 1;
        // $todo->save();
        return redirect('/');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect('/');
    }

}
