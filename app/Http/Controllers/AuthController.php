<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->session()->exists('user')) {
            $userName = $request->session()->get('user');
            if ($userName != null) {
                return view('/dashboard');
            }
        }
        return view('/login');
    }

    public function checkLogin(Request $request)
    {
        $request->validate([
            'cpf' => 'required',
            'password' => 'required'
        ]);
        $user = User::where(['cpf' => $request->cpf])->first();
        if (!$user || Hash::check($request->password, $user->password)) {
            $request->session()->put('user', $user);
            $request->session()->reflash();
            if ($request->session()->has('user')) {
                return response()->json(['success' => '✔ Logado com sucesso!']);
            }
            return response()->json(['error' => 'Erro ao logar!']);
        }
    }

}