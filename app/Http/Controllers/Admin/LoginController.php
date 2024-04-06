<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request) {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Autenticación exitosa, redirigir a la página admin/dashboard
            return redirect(app()->getLocale()  . '/admin/dashboard');
        } else {
            // Autenticación fallida, redirigir de vuelta con un mensaje de error
            return redirect(app()->getLocale() . '/admin')->with('error', 'Credenciales incorrectas');
        }
    }
}
