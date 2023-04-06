<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Password;


class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        if ($request->session()->exists('user')) {
            $userName = $request->session()->get('user');
            if ($userName != null) {
                return view('/dashboard');
            }
        } else {
            return view('login', [
                'error' => "Login inválido!"
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
   
}