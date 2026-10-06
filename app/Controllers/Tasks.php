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
                ->where('is_archived', false)
                ->orderBy('created_at', 'ASC')
                ->findAll()
        ];

        return view('welcome', $data);
    }

    // Task List page - all non-archived tasks
    public function all()
    {
        $data = [
            'title' => 'All Tasks',
            'tasks' => $this->taskModel
                ->where('is_archived', false)
                ->orderBy('task_date', 'ASC')
                ->orderBy('created_at', 'ASC')
                ->findAll()
        ];

        return view('tasks', $data);
    }

    // Show create task form
    public function new()
    {
        return view('tasks_new', [
            'title' => 'Add New Task'
        ]);
    }

    // Create a new task
    public function create()
    {
        $rules = [
            'title' => 'required',
            'task_date' => 'required|valid_date[Y-m-d]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->taskModel->insert([
            'title' => $this->request->getPost('title'),
            'task_date' => $this->request->getPost('task_date'),
            'is_archived' => false
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task created successfully.');
    }

    // Show edit task form
    public function edit($id)
    {
        $task = $this->taskModel
            ->where('is_archived', false)
            ->find($id);

        if (!$task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Task not found.'
            );
        }

        return view('tasks_edit', [
            'title' => 'Edit Task',
            'task'  => $task
        ]);
    }

    // Update an existing task
    public function update($id)
    {
        $task = $this->taskModel
            ->where('is_archived', false)
            ->find($id);

        if (!$task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Task not found.'
            );
        }

        $rules = [
            'title' => 'required',
            'task_date' => 'required|valid_date[Y-m-d]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->taskModel->update($id, [
            'title' => $this->request->getPost('title'),
            'task_date' => $this->request->getPost('task_date')
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task updated successfully.');
    }

    // Archive a task instead of permanently deleting it
    public function delete($id)
    {
        $task = $this->taskModel
            ->where('is_archived', false)
            ->find($id);

        if (!$task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Task not found.'
            );
        }

        $this->taskModel->update($id, [
            'is_archived' => true
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task archived successfully.');
    }
}