<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class WelcomeController extends Controller
{
    public function index() {
        return view('welcome', [
        'posts' => Post::all()
        ]);
    }
}
