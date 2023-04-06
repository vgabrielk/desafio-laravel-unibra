<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Password;


class RegistrationController extends Controller
{
    public function registrationView(Request $request)
    {
        if ($request->session()->exists('user')) {
            $userName = $request->session()->get('user');
            if ($userName != null) {
                return view('dashboard', [
                    'name' => $userName->fullname
                ]);
            }
        }
        return view('auth.registration');

    }
    public function registrationUser(Request $request)
    {

        $request->validate([
            'fullname' => 'required',
            'cpf' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $cpf = $request->cpf;
        $email = $request->email;

        $cpf = User::where(['cpf' => $cpf])->first();
        $email = User::where(['email' => $email])->first();

        if ($cpf) {
            return response()->json(['error' => '✘ Cpf já existe']);  //Valida se cpf existe antes de cadastrar
        }
        if ($email) {
            return response()->json(['error' => '✘ Email já existe']); //Valida se email existe antes de cadastrar
        }

        $res = User::create([
            'fullname' => $request['fullname'],
            'cpf' => $request['cpf'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);
        return response()->json(['success' => '✔ Cadastrado com sucesso!']); 

    }

}