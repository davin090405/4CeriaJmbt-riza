<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumProjectController extends Controller
{
    public function index()
    {
        return view('users-page.forumProject'); 
    }
}
