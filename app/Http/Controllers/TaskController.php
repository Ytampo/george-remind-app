<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Routing\Controller;

class TaskController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect('/login'); // ログインしていない場合はログインページにリダイレクト
        }
        $tasks = auth()->user()->tasks; // 現在ログインしているユーザーの課題を取得
        return view('my-tasks', compact('tasks'));
    }

    public function __construct()
    {
        $this->middleware('auth'); // 認証ミドルウェアを追加
    }

    public function store(Request $request)
    {
        $request->validate([
            'task-name' => 'required|string|max:255',
            'date-limit' => 'required|date',
            'time-limit' => 'required',
            'priority' => 'required|integer|min:1|max:5',
        ]);

        $task = new Task();
        $task->task_name = $request->input('task-name');
        $task->date_limit = $request->input('date-limit');
        $task->time_limit = $request->input('time-limit');
        $task->priority = $request->input('priority');
        $task->user_id = auth()->id(); // 現在ログインしているユーザーのIDを設定
        $task->save();

        return response()->json(['message' => '課題が保存されました！'], 200);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        // 現在のユーザーがこの課題を所有していることを確認
        if ($task->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $task->delete();

        return redirect()->route('my-tasks')->with('message', 'タスクを削除しました');
    }
}