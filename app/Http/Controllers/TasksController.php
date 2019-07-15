<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{

    /**
     * Gets the tasks belonging to the logged in user and 
     * returns them to 'resources/js/components/Tasks.vue'.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the user to filter tasks
        $user  = auth()->user();

        // Get Tasks
        $tasks = Task::select('description')->where('user_id', '=', $user->id)->get();

        // Pull out the task 'description' for the purposes of this project
        $task_list = [];
        foreach ($tasks as $key => $value)
            $task_list[] = $value->description;

        // See 'resources/js/components/Tasks.vue'.
        return $task_list;
    }

    /**
     * Store a newly created task in storage.
     * See 'resources/js/components/Tasks.vue'.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get the current user
        $user = auth()->user();

        $this->validate($request, [
            'description' => 'required',
        ]);

        // See 'resources/js/components/Tasks.vue'.
        Task::forceCreate([
            'user_id' => $user->id,
            'description' => request('description')
        ]);
    }
}
