<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::orderBy('id', 'asc')->paginate(12);
        $viewAllIndex = $viewIndex = $editIndex = $deleteIndex = true;
        $msg = '';

        //if auth user does not have 'Products-all' permission
        if(Auth::user()->cannot('viewAll', Task::class)) {
            $viewAllIndex = false;
            $msg = 'You do not have permissions to view products page';
        }

        //if auth user do not have 'Products-view' permission
        if(Auth::user()->cannot('view', Task::class)) {
            $viewIndex = false;
        }

        //if auth user do not have 'Products-edit' permission
        if(Auth::user()->cannot('edit', Task::class)) {
            $editIndex = false;
        }

        //if auth user do not have 'Products-delete' permission
        if(Auth::user()->cannot('delete', Task::class)) {
            $deleteIndex = false;
        }

        return response()->Json([
            'viewAll_index' => $viewAllIndex,
            'view_index' => $viewIndex,
            'edit_index' => $editIndex,
            'delete_index' => $deleteIndex,
            'message' => $msg,
            'data' => $tasks,
        ]);
    }

    public function show($id) {
        $task = Task::find($id);
        $index = true;
        if($task != null){
            $msg = 'Found the project';
            if(Auth::user()->cannot('view', Task::class)) {
                $index = false;
                $msg = 'You do not have access to view product details';
            }
        }else{
            $msg = 'This project does not exist';
        }
        return response()->Json([
            'index' => $index,
            'message' => $msg,
            'data' => $task,
        ]);
    }

    public function create(Request $request) {
        $index = true;

        //if auth user do not have 'Products-create' permission
        if(Auth::user()->cannot('create', Task::class)) {
            $index = false;
            $msg = 'You do not have access to create new product';
        }else{
            $task = new Task;
            $task->title = $request->input('title');
            $task->project_id = $request->input('project_id');
            $task->description = $request->input('description');
            $task->status = $request->input('status');
            $task->save();
            $msg = 'Project created successfully';
        }

        return response()->Json([
            'index' => $index,
            'message' => $msg,
        ]);
    }

    public function edit(Request $request, $id)  {
        $index = true;
        $task = Task::find($id);
        $msg = $task;
        if($task != null){
            if(Auth::user()->cannot('edit', Task::class)) {
                $index = false;
                $msg = 'You do not have access to edit product';
            }else{
                $validatedData = $request->validate([
                    'title' => 'required|string',
                    'project_id' => 'required|string',
                    'description' => 'required|date',
                    'status' => 'required|date',
                ]);
                // Actualiza los datos del proyecto
                $task->title = $validatedData('title');
                $task->project_id = $validatedData('project_id');
                $task->description = $validatedData('description');
                $task->status = $validatedData('status');
                $task->save();
                $msg = 'Project edited successfully';
            }
        }else{
            $msg = 'The project does not exist';
        }
        return response()->Json([
            'index' => $index,
            'message' => $msg,
        ]);
    }

    public function del($id) {
        $task = Task::find($id);
        $index = true;

        if($task != null){
        //if auth user do not have 'Products-delete' permission
            if(Auth::user()->cannot('delete', Task::class)) {
                $index = false;
                $msg = 'You do not have access to delete product';
            }else{
                $task->delete();
                $msg = 'Project deleted successfully';
            }
        }else{
            $msg = 'This project does not exist';
        }
        return response()->Json([
            'index' => $index,
            'message' => $msg,
        ]);
    }
}
