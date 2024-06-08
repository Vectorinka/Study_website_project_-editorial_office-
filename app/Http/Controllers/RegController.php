<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegController extends Controller
{
    function index(): View
    {
        return view('reg');
    }

    function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'login' => 'required|string|max:255|regex:/[a-zA-Z0-9-_]{3,}/',
            'password' => 'required|string|min:6',
            'save-data' => 'string',
        ]);

        $user = User::query()
        ->where('name', $data['login'])
        ->first('id');

        if(isset($user))
        {
            return back()->withErrors('Такой пользователь уже есть');
        }
        
        User::create([
            'name' => $data['login'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::attempt([
            'name' => $data['login'],
            'password' => $data['password'],
        ], isset($data['save-data']));

        return redirect()->route('home');
    }
}
