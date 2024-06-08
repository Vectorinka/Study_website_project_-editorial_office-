<?php

namespace App\Http\Controllers;

use App\Models\Conf;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ConfController extends Controller
{
    function index(): View
    {
        return view('conf.index');
    }
    
    function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'full-name' => 'required|string|max:255|regex:/[А-Яа-яЁё]/u',
            'phone' => 'required|regex:/(\+7)[0-9]{9}/',
            'email' => 'required|email|max:255',
            'sections' => 'required',
            'birth-date' => 'nullable|date',
            'report' => 'string',
            'report-theme' => 'nullable|string|max:255',
        ]);
        
        $isConf = Conf::query()
        ->where('phone', $data['phone'])
        ->where('email', $data['email'])
        ->first();

        if(isset($isConf))
        {
            return back()->withErrors('Такой пользователь уже зарегестрирован');
        }

        $data['full_name'] = $data['full-name'];
        $data['section'] = $data['sections'];
        $data['has_report'] = $data['report'] ?? null;
        $data['has_report'] = $data['has_report'] == 'on';
        $data['report_theme'] = $data['report-theme'];
        $data['birth_date'] = $data['birth-date'];

        Conf::create($data);

        return back();
    }
}
