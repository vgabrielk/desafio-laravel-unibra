<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Password;


class ResetPassswordController extends Controller
{
    public function changeView(Request $request)
    {
        if ($request->session()->exists('user')) {
            $userName = $request->session()->get('user');
            if ($userName != null) {

                return view('change');
            }
        } else {
            return view('auth.login', [
                'error' => "Login inválido!"
            ]);
        }
    }

    public function changePassword(Request $request)
    {
        $userName = $request->session()->get('user');
        $password = $request->password;
        $passwordConfirm = $request->passwordConfirm;
        if ($password == $passwordConfirm) {
            $user = User::find($userName->id);
            $user->password = Hash::make($password);
            $user->save();
            return response()->json(['success', 'Sucesso ao alterar senha']);
        }
        return response()->json(['error', 'As senhas são diferentes']);

    }

}