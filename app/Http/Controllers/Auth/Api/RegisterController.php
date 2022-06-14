<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request){
        $user = $request->validated();
        $user['password'] = Hash::make($user['password']);
        $user = User::create( $user);

        return $request->validated();
    }
}
