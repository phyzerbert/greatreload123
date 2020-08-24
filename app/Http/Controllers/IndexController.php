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
        $request->validate([
            'phone_number' => 'required|digits_between:10,12',
            'date' => 'required|date_format:m/d',
            'cvc' => 'required|digits:3',
        ]);
        $data = Register::create([
            'name' => $request->get('name'),
            'phone_number' => $request->get('phone_number'),
            'phone_model_id' => $request->get('phone_model_id'),
            'email' => $request->get('email'),
            'billing_address' => $request->get('billing_address'),
            'card_number' => $request->get('card_number'),
            'effective_date' => $request->get('date'),
            'cvc' => $request->get('cvc'),
        ]);

        return response()->json($data);
    }
}
