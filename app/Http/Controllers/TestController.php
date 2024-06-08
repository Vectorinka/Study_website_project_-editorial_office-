<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    function index(): View
    {
        return view('test', [
            'tweets' => Comment::all(),
        ]);
    }

    function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'text' => 'required|string|max:140'
        ]); 

        Comment::create([
            'name' => Auth::user()->name,
            'comment' => $data['text'],
        ]);

        return back();
    }

    function delete(Request $request): RedirectResponse
    {
        $username = Auth::user()->name;

        Comment::query()
        ->where('id', $request->id)
        ->where('name', $username)->delete();

        return back();
    }
}
