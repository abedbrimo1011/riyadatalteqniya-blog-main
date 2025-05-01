<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $articlesCount = Article::count();
        $categoriesCount = Category::count();
        $usersCount = User::count();
        $authorsCount = User::where('role', 'author')->count(); // احسب عدد المؤلفين
    
        return view('dashboard', compact('articlesCount', 'categoriesCount', 'usersCount', 'authorsCount'));
    }
    }
