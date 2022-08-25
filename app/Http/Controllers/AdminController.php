<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    //


    public function index(Request $request)
    {
        if ($request->session()->has('ADMIN_LOGIN')) {
            return redirect('/home');
        } else {
            return view('admin.login');
        }
    }

    public function auth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $result = Admin::where(['email' => $request->email])->first();
        if ($result) {
            if (Hash::check($request->password, $result->password)) {
                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_ID', $result->id);
                return redirect('/home');
            } else {
                $request->session()->flash('error', 'please enter correct password');
                return redirect('admin');
            }
        } else {
            $request->session()->flash('error', 'please enter valid login credentials');
            return redirect('admin');
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/admin');
    }

    public function home(Request $request)
    {
        $r  = Admin::find(1);

        back()->with('email', $r->email);
        return view('admin.layout');
    }
}
