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
            return $this->buildResponse([], 401, "E-mail ou senha inválidos!");
        }

        $user = Auth::user();
        $token = $user->createToken('token');

        return $this->buildResponse([
            'token' => $token->plainTextToken,
            'token_complete' =>  "Bearer {$token->plainTextToken}",
            'data_user' => $user
        ], 200, "Login realizado com sucesso");
    }
}
