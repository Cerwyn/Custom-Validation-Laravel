<?php

namespace App\Http\Controllers;

use App\Rules\Phone;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'phone' => ['required', new Phone($request['country'])],
        ]);

        return redirect(route('index'));
    }
}
