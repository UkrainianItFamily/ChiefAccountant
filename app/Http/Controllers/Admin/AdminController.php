<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function getAdminHomePage()
    {
        return view('pages.admin.index');
    }
}
