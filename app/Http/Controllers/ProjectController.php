<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::orderBy('id', 'asc')->paginate(12);
        $viewAllIndex = $viewIndex = $editIndex = $deleteIndex = true;
        $msg = '';

        //if auth user does not have 'Products-all' permission
        if(Auth::user()->cannot('viewAll', Project::class)) {
            $viewAllIndex = false;
            $msg = 'You do not have permissions to view products page';
        }

        //if auth user do not have 'Products-view' permission
        if(Auth::user()->cannot('view', Project::class)) {
            $viewIndex = false;
        }

        //if auth user do not have 'Products-edit' permission
        if(Auth::user()->cannot('edit', Project::class)) {
            $editIndex = false;
        }

        //if auth user do not have 'Products-delete' permission
        if(Auth::user()->cannot('delete', Project::class)) {
            $deleteIndex = false;
        }

        return response()->Json([
            'viewAll_index' => $viewAllIndex,
            'view_index' => $viewIndex,
            'edit_index' => $editIndex,
            'delete_index' => $deleteIndex,
            'message' => $msg,
            'data' => $projects,
        ]);
    }

    public function show($id) {
        $project = Project::find($id);
        $index = true;
        if($project != null){
            $msg = 'Found the project';
            if(Auth::user()->cannot('view', Project::class)) {
                $index = false;
                $msg = 'You do not have access to view product details';
            }
        }else{
            $msg = 'This project does not exist';
        }
        return response()->Json([
            'index' => $index,
            'message' => $msg,
            'data' => $project,
        ]);
    }

    public function create(Request $request) {
        $index = true;

        //if auth user do not have 'Products-create' permission
        if(Auth::user()->cannot('create', Project::class)) {
            $index = false;
            $msg = 'You do not have access to create new product';
        }else{
            $project = new Project;
            $project->title = $request->input('title');
            $project->user_id = $request->input('user_id');
            $project->description = $request->input('description');
            $project->date_start = $request->input('date_start');
            $project->date_end = $request->input('date_end');
            $project->save();
        }

        return response()->Json([
            'index' => $index,
            'message' => 'Project created successfully',
        ]);
    }

    public function edit(Request $request, $id)  {
        $index = true;
        $project = Project::findOrFail($id);
        if($project != ''){
            if(Auth::user()->cannot('edit', Project::class)) {
                $index = false;
                $msg = 'You do not have access to edit product';
            }else{
                $validatedData = $request->validate([
                    'title' => 'required|string',
                    'description' => 'required|string',
                    'date_start' => 'required|date',
                    'date_end' => 'required|date',
                ]);
                // Actualiza los datos del proyecto
                $project->title = $validatedData['title'];
                $project->user_id = $request->input('user_id');
                $project->description = $validatedData['description'];
                $project->date_start = $validatedData['date_start'];
                $project->date_end = $validatedData['date_end'];
                $project->save();
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
        $project = Project::find($id);
        $index = true;

        if($project != null){
        //if auth user do not have 'Products-delete' permission
            if(Auth::user()->cannot('delete', Project::class)) {
                $index = false;
                $msg = 'You do not have access to delete product';
            }else{
                $project->delete();
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
