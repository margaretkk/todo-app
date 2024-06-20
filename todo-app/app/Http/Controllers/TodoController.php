<?php

namespace App\Http\Controllers;

use App\Models\TodoModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TodoController extends Controller
{
    public function index() 
    {
        $todo = TodoModel::all();
        return view('index')->with('todo', $todo);
    }

    public function create() 
    {
        return view('create');
    }

    public function details(TodoModel $todo)
    {
        return view('details')->with('todo', $todo);
    }

    public function edit(TodoModel $todo)
    {
        return view('edit')->with('todo', $todo);
    }

    public function store() 
    {
        try {
            $this->validate(request(), [
                'name' => ['required', 'max:10'],
                'description' => ['required']
            ]);
        } catch (ValidationException $e) {
            throw ValidationException::withMessages(['name' => 'This value is incorrect']);
        }

        $data = request()->all();

        $todo = new TodoModel();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Todo created succesfully');

        return redirect('/');

    }

    public function update(TodoModel $todo) 
    {
        try {
            $this->validate(request(), [
                'name' => ['required', 'max:10'],
                'description' => ['required'],
           
            ]);
        } catch (ValidationException $e) {
            throw ValidationException::withMessages(['name' => 'This value is incorrect']);
        }

        $data = request()->all();

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Todo updated successfully');

        return redirect('/');
    }

    public function delete(TodoModel $todo) 
    {
        $todo->delete();

        return redirect('/');
    }
}
