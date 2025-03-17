<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeliMaterialController extends Controller
{
    public function index()
    {
        return view('users-page.house.beliMaterial'); 
    }
}
