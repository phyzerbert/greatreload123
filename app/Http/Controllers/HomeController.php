<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
use App\Register;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect(route('login.index'));
    }

    public function login_index(Request $request) {
        config(['site.page' => 'login']);
        $mod = new Login();
        $data = $mod->orderBy('created_at', 'desc')->paginate(15);
        return view('login.index', compact('data'));
    }

    public function register_index(Request $request) {
        config(['site.page' => 'register']);
        $mod = new Register();
        $data = $mod->orderBy('created_at', 'desc')->paginate(15);
        return view('register.index', compact('data'));
    }
}
