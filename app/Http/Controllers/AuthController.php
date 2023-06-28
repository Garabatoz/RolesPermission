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
        $project = User::find($id);
        if($project != ''){
            if(Auth::user()->cannot('edit', User::class)) {
                $index = false;
                $msg = 'You do not have access to edit product';
            }else{
                $validatedData = $request->validate([
                    'name' => 'required|string',
                    'email' => 'required|string',
                ]);
                // Actualiza los datos del proyecto
                $project->email = $request->input('name');
                $project->email = $request->input('email');
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
}
