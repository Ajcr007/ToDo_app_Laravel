<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index():view
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $todo = Todo::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($todo) {
            return response()->json(['status' => 'success', 'message' => 'Success! Todo is created', 'todo' => $todo]);
        }
        return response()->json(['status' => 'failed', 'message' => 'Failed! Unable to create Todo']);
    }

    public function show(Todo $todo)
    {
        if ($todo) {
            return response()->json(['status' => 'success', 'todo' => $todo]);
        }
        return response()->json(['status' => 'failed', 'message' => 'Failed! No todo found!']);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, Todo $todo)
    {
        if ($todo) {
            $todo['title'] = $request->title;
            $todo['description'] = $request->description;
            $todo->save();
            return response()->json(['status' => 'success', 'message' => 'Success! Todo is updated', 'todo' => $todo]);
        }
        return response()->json(['status' => 'failed', 'message' => 'Failed! Unable to update Todo']);
    }

    public function destroy(Todo $todo)
    {
        if ($todo) {
            $todo->delete();
            return response()->json(['status' => 'success', 'message' => 'Success! Todo is deleted', 'todo' => $todo]);
        }
        return response()->json(['status' => 'success', 'message' => 'Failed! Unable to delete todo']);
    }

    /**
     * Function : Mark As Completed
     * @param request
     */
    public function markAsCompleted(Request $request) {
        if ($request->todoIds) {
            $todos = [];

            foreach ($request->todoIds as $todoId) {
                $todo = Todo::find($todoId);
                if ($todo) {
                    unset($todo->title);
                    unset($todo->description);
                    unset($todo->created_at);
                    $todos[] = $todo;

                    $todo['is_completed'] = true;
                    $todo->save();
                }
            }
            return response()->json(['status' => 'success', 'message' => 'Todos updated', 'todos' => $todos]);
        }
        return response()->json(['status' => 'failed', 'message' => 'No Todos found!']);
    }

    /**
     * Function : Bulk Delete
     * @param request
     */
    public function bulkDelete(Request $request) {
        if ($request->todoIds) {
            $response = Todo::whereIn('id', $request->todoIds)->delete();

            if ($response) {
                return response()->json(['status' => 'success', 'message' => 'Todos deleted successfully']);
            }
            return response()->json(['status' => 'failed', 'message' => 'Unable to delete Todos!']);
        }
        return response()->json(['status' => 'failed', 'message' => 'No Todos found!']);
    }
}
