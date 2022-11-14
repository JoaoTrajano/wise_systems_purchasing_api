<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $this->sanitize($credentials);

        if (empty($credentials['email'] || empty($credentials['password']))) {
            return $this->buildResponse([], 400, "Campos email e senha obrigatórios!");
        }

        if (!Auth::attempt($credentials)) {
            return $this->buildResponse([], 400, "E-mail ou senha inválidos!");
        }

        //$2y$10$n8nClTd/R2grrFZnhDpjZuJTvtY/5UlLzJ6QfGFb1Pb9qFhyqKHGK

        $user = Auth::user();
        $token = $user->createToken('token');

        return $this->buildResponse([
            'token' => $token->plainTextToken,
            'token_complete' =>  "Bearer {$token->plainTextToken}",
            'data_user' => $user
        ], 200, "Login realizado com sucesso!");
    }

    public function sanitize(array $credentials): array
    {
        foreach ($credentials as $index => $value) {
            $credentials[$index] = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $credentials;
    }
}
