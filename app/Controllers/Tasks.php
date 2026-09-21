<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    protected $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
    }

    // Welcome page - today's tasks only
    public function index()
    {
        $data = [
            'title' => 'Today\'s Tasks',
            'tasks' => $this->taskModel
                ->where('task_date', date('Y-m-d'))
                ->orderBy('created_at', 'ASC')
                ->findAll()
        ];

        return view('welcome', $data);
    }

    // Task List page - all tasks
    public function all()
    {
        $data = [
            'title' => 'All Tasks',
            'tasks' => $this->taskModel
                ->orderBy('task_date', 'ASC')
                ->orderBy('created_at', 'ASC')
                ->findAll()
        ];

        return view('tasks', $data);
    }
}