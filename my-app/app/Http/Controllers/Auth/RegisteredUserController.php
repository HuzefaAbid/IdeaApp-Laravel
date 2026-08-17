<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(storeUserRequest $request)
    {
        $attributes = $request->validated();

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/ideas');
    }
}
