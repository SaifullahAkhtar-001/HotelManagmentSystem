<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreatehotelController extends Controller
{
    public function showform()
    {
        return view('creation.createhotel');
    }
}
