<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function index() {
        $users = User::orderBy('id', 'asc')->paginate(12);
        $viewAllIndex = $viewIndex = $editIndex = $deleteIndex = true;
        $msg = '';

        //if auth user does not have 'Products-all' permission
        if(Auth::user()->cannot('viewAll', User::class)) {
            $viewAllIndex = false;
            $msg = 'You do not have permissions to view products page';
        }

        //if auth user do not have 'Products-view' permission
        if(Auth::user()->cannot('view', User::class)) {
            $viewIndex = false;
        }

        //if auth user do not have 'Products-edit' permission
        if(Auth::user()->cannot('edit', User::class)) {
            $editIndex = false;
        }

        //if auth user do not have 'Products-delete' permission
        if(Auth::user()->cannot('delete', User::class)) {
            $deleteIndex = false;
        }

        return response()->Json([
            'viewAll_index' => $viewAllIndex,
            'view_index' => $viewIndex,
            'edit_index' => $editIndex,
            'delete_index' => $deleteIndex,
            'message' => $msg,
            'data' => $users,
        ]);
    }
    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()) {
            $msg = [];
            foreach(array_values($validator->errors()->toArray()) as $val) {
                foreach($val as $error) {
                    $msg[] = $error;
                }
            }
            $res = [
                'response_index' => true,
                'response_type' => 'error',
                'response_data' => $msg,
                'authenticated' => false,
            ];

            return response()->json($res, 200);
        }
        // Creating a token without scopes...
        if(Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $user->api_token = Auth::user()->createToken('Token Name')->accessToken; // Genera un nuevo token
            $user->save();
            $res = [
                'response_index' => true,
                'response_type' => 'success',
                'response_data' => ['You Have Logged In Successfully'],
                'authenticated' => true,
                'token' =>  $user->api_token,
            ];
            return response()->json($res, 200);
        }

        else {
            $res = [
                'response_index' => true,
                'response_type' => 'error',
                'response_data' => ['Given Credentials Does Not Match Our Record'],
                'authenticated' => false,
            ];

            return response()->json($res, 200);
        }
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return response()->json('logout successfull');
    }

    public function edit(Request $request, $id)  {
        $index = true;
        $msg = 'Project edited successfully';
        $user = User::find($id);
        if($user != ''){
            if(Auth::user()->cannot('edit', User::class)) {
                $index = false;
                $msg = 'You do not have access to edit user';
            }else{
                $validatedData = $request->validate([
                    'name' => 'required|string',
                    'email' => 'required|string',
                ]);
                // Actualiza los datos del proyecto
                $user->email = $request->input('name');
                $user->email = $request->input('email');
                $user->save();
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
    public function show($id) {
        $product = User::find($id);
        $index = true;
        $msg = '';

        //if auth user do not have 'Products-view' permission
        if(Auth::user()->cannot('view', User::class)) {
            $index = false;
            $msg = 'You do not have access to view product details';
        }

        return response()->Json([
            'index' => $index,
            'message' => $msg,
            'data' => $product,
        ]);
    }
}
