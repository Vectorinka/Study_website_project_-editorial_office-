<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    function index(): View
    {
        $images = Gallery::all();

        return view(
            'gallery', [
                'images' => $images,
            ]);
    }

    function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'image' => 'required|string',
        ]);
    
        Gallery::create([
            'image' => $data['image'],
        ]);

        return back();
    }
}
