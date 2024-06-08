<?php

namespace App\Http\Controllers;

use App\Models\Twitter;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwitterController extends Controller
{
    function index(): View
    {
        return view('twitter', [
            'tweets' => Twitter::all(),
        ]);
    }

    function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'text' => 'required|string|max:140'
        ]); 

        Twitter::create([
            'username' => Auth::user()->name,
            'tweet' => $data['text'],
        ]);

        return back();
    }

    function delete(Request $request): RedirectResponse
    {
        $username = Auth::user()->name;

        Twitter::query()
        ->where('id', $request->id)
        ->where('username', $username)->delete();

        return back();
    }
}
