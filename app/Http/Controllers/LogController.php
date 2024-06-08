<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LogController extends Controller
{
    function index(): View
    {
        return view('log');
    }

    function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('home');
    }

    function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'login' => 'required|string|max:255|regex:/[a-zA-Z0-9-_]{3,}/',
            'password' => 'required|string|min:6',
            'save-data' => 'string',
        ]);

        $auth = Auth::attempt([
            'name' => $data['login'],
            'password' => $data['password'],
        ], isset($data['save-data']));

        if(!$auth)
        {
            return back()->withErrors('Неверный пароль или логин');
        }

        return redirect()->route('home');
    }
}
