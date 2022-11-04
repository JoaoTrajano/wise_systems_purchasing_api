<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function store(Request $request) {
        User::create($request->all());
    }

    public function index() {
        return response()->json(User::all());
    }
}
