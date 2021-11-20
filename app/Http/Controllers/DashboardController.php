<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.index', [
            'posts_count' => Post::all()->count(),
            'users_count' => User::all()->count(),
            'categories_count' => Category::all()->count()
        ]);
    }
    // public function backToHome() {
    //     return redirect(route(users.welcome));
    // }
}
