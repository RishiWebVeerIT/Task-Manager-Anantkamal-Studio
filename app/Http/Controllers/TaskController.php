<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
{
    return view('dashboard');
}

public function fetch()
{
    $tasks = Auth::user()->tasks()->get();
    return response()->json($tasks);
}

public function store(Request $request)
{
    $request->validate(['title' => 'required']);
    $task = Auth::user()->tasks()->create($request->only('title'));
    return response()->json($task);
}

public function edit($id)
{
    $task = Auth::user()->tasks()->findOrFail($id);
    return response()->json($task);
}

public function update(Request $request, $id)
{
    $request->validate(['title' => 'required']);
    $task = Auth::user()->tasks()->findOrFail($id);
    $task->update($request->only('title'));
    return response()->json($task);
}

public function destroy($id)
{
    $task = Auth::user()->tasks()->findOrFail($id);
    $task->delete();
    return response()->json(['success' => true]);
}

public function toggleStatus($id)
{
    $task = Auth::user()->tasks()->findOrFail($id);
    $task->status = $task->status === 'Pending' ? 'Done' : 'Pending';
    $task->save();
    return response()->json($task);
}
}
