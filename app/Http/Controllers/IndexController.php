<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Login;
use App\Register;

class IndexController extends Controller
{
    public function show_login() {
        return view('login.show');
    }

    public function show_register() {
        return view('register.show');
    }

    public function login_save(Request $request) {
        $data = Login::create([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);

        return response()->json($data);
    }

    public function register_save(Request $request) {
        $data = Register::create([
            'name' => $request->get('name'),
            'phone_number' => $request->get('phone_number'),
            'email' => $request->get('email'),
            'billing_address' => $request->get('billing_address'),
            'bank_account' => $request->get('bank_account'),
            'effective_date' => $request->get('effective_date'),
            'cvc' => $request->get('cvc'),
        ]);

        return response()->json($data);
    }
}
