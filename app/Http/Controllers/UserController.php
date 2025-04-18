<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10); // يعرض 10 مستخدمين لكل صفحة
        return view('users.index', compact('users'));
    }
}
