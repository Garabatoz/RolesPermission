<?php

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login']);

Route::post('user/create', [RegisterController::class, 'create']);

Route::middleware('auth:api')->group(function () {
    /*
        Route::get('admin/', [ProductController::class, 'index']);
        Route::resource('products', ProductController::class)->only(['index', 'show', 'create', 'edit']);
    */
    Route::get('admin/', [ProjectController::class, 'index']);
    /* Route::resource('projects', ProjectController::class)->only(['index', 'show', 'create', 'edit']); */

    Route::delete('admin/projects/delete/{id}', [ProjectController::class, 'del']);
    Route::post('admin/projects/create', [ProjectController::class, 'create']);
    Route::put('admin/projects/edit/{id}', [ProjectController::class, 'edit']);
    Route::get('admin/projects/show/{id}', [ProjectController::class, 'show']);

    Route::resource('admin/roles', RoleController::class);
    Route::resource('admin/permissions', PermissionController::class);

    Route::put('admin/users/edit/{id}', [AuthController::class, 'edit']);
    Route::get('admin/users/show/{id}', [AuthController::class, 'show']);

    Route::put('admin/tasks/edit/{id}', [TaskController::class, 'edit']);
    Route::get('admin/tasks/show/{id}', [TaskController::class, 'show']);
    Route::post('admin/tasks/create', [TaskController::class, 'create']);
    Route::delete('admin/tasks/delete/{id}', [TaskController::class, 'del']);

    Route::get('admin/project/{id}/tasks', [ProjectController::class, 'showTask']);

    /* Route::get('admin/project/{id}/tasks', function ($id) {
        $project = Project::find($id);
        $cantidadTareas = $project->tasks()->count();

        return response()->json(['cantidad_tareas' => $cantidadTareas]);
    }); */
});

Route::group(['middleware' => ['auth:sanctum', 'admin']], function() {

    Route::get('/logout', [AuthController::class, 'logout']);

    /* Route::get('/user', function (Request $request) {
        return $request->user();
    });
 */

    Route::group(['prefix' => 'admin'], function(){
    });
});
