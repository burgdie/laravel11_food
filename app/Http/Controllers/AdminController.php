<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Admin Login Function
     *
     * @return void
     */
    public function AdminLogin(){
        return view('admin.login');

    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function AdminDashboard(){
        return view('admin.admin_dashboard');

    }

    /**
     *
     *
     */
    public function AdminLoginSubmit(Request $request){


    }

}
