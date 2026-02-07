<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        return 'admin dashboard';
    }

    public function usersList() {
        return 'users list';
    }
}
