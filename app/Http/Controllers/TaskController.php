<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // constructor
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // generate the response by passing the request to the next middleware or controller
            $response = $next($request);
            // add caching headers to the response
            $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
            $response->headers->set('Pragma', 'no-cache');
            $response->headers->set('Expires', '0');
            // return the modified response
            return $response;
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        $page = "Tasks ";
        $tasks = Task::all();
        $data = array('page' => $page, 'tasks' => $tasks);
        return view('user.tasks')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = "New Task ";
        $data = array('page' => $page);
        return view('user.newtask')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // get user input
        $title = $request->title;
        $description = $request->description;
        $date = $request->date;
        // store in array
        $task = array(
            'title' => $title,
            'description' => $description,
            'date' => $date
        );
        // store in DB
        Task::create($task);
        // return response
        return response()->json(['success' => true, 'message' => 'Task Created Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = "Edit Task ";
        $task = Task::find($id);
        $data = array('page' => $page, 'task' => $task);
        return view('user.edittask')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // get user input
        $title = $request->title;
        $description = $request->description;
        $date = $request->date;
        $status = $request->status;
        // find task
        $task = Task::find($id);
        $task->title = $title;
        $task->description = $description;
        $task->date = $date;
        $task->status = $status;
        // save task
        $task->save();
        // return response
        return response()->json(['success' => true, 'message' => 'Task Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        // get request data
        $action = $request->action;
        // find task
        $task = Task::find($id);
        // cond
        if($action == "DELETE") {
            // delete task
            $task->delete();
            // return response
            return response()->json(['success' => true, 'message' => 'Task Deleted Successfully', 'redirect' => '/user/tasks']);
        }
    }
}
