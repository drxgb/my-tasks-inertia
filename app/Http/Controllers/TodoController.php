<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\UpdateTodoRequest;

class TodoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateTodoRequest $request)
    {
        $validated = $request->validated();
        $request->user()->todos()->create($validated);
        return to_route('home')->with('message', 'Task create successfully!');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $validated = $request->validated();
        $todo->update($validated);
        return to_route('home')->with('message', 'Task updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return to_route('home')->with('message', 'Task removed successfully!');
    }
}
