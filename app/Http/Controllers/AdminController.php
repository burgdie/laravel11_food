<?php

namespace App\Http\Controllers;

use Mail;
use App\Models\Admin;
use App\Mail\Websitemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $request->validate([
           'email' => 'required|email',
           'password' => 'required',
        ]);
        $check = $request->all();
        $data = [
            'email' => $check['email'],
            'password' => $check['password'],
        ];
        if(Auth::guard('admin')->attempt($data)){
            return redirect()->route('admin.dashboard')->with('success', 'Login successfully');

        }else {
            return redirect()->route('admin.login')->with('error', 'Invalid Credentials');
        }

    }

    /**
     *
     */
    public function AdminLogout(){
        echo('AdminLogout');
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logout Success');

    }

    /**
     *
     */
    public function AdminForgetPassword() {
        return view('admin.forget_password');
    }

    /**
     *
     */
    public function AdminPasswordSubmit(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);
        $admin_data = Admin::where('email', $request->email)->first();
        if(!$admin_data){
            return redirect()->back()->with('error','Email Not Found');
        }
        $token = hash('sha256',time());
        $admin_data ->token = $token;

        $admin_data->update();

        $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);
        $subject = "Reset Password";
        $message = "Please Click on Link Below to reset Password<br>";
        $message .= "<a href='".$reset_link. " '> Click here </a>";

        \Mail::to($request->email)->send(new Websitemail($subject, $message));
        return redirect()->back()->with('success', 'Reset Password Link Send on your Email');


    }

}
