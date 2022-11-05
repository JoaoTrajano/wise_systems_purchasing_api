<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Login ou senha inválidos'
            ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('token');

        return response()->json([
            'status' => 'success',
            'message' => 'Login realizado com sucesso',
            'token' => $token->plainTextToken
        ], 200);
    }
}
