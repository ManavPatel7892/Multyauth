<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {
        // Your existing registration code...

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Create a token for the registered user
        $token = $user->createToken('MyApp')->plainTextToken;
        $users = User::all();
        return response()->json([
            'message' => 'User registered successfully',
            'token' => $token,
            'users' => $users,
        ], 200);

        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $success = $user->createToken('MyApp', ['read:user'])->plainTextToken;
        return response()->json([
            'message'=>'User Register Successfully',
            'data'=>$success
        ],200);
    }

    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            $user = Auth::user();
            $user = User::find(1);
        $token = $user->createToken('api-token')->plainTextToken;
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;

            $response = [
                'success' => true,
                'data' => $success,
                'message' => 'User Login Successfully'
            ];
            return response()->json($response,200);
        }else{
            $response = [
                'success' => false,
                'message' => 'Unauthorised'
            ];
            return response()->json($response);
        }
    }
    public function getAllUsers(Request $request)
    {
        // Ensure the request is authenticated
        $user = Auth::user();

        // Check if the user has the necessary permissions
        if (!$user->tokenCan('read:user')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Fetch all users
        $users = User::all();

        return response()->json([
            'message' => 'List of all registered users',
            'users' => $users,
        ], 200);
    }
}
