<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class RecoverPasswordController extends Controller
{

    public function forgot(Request $request)
    {
        $user = User::where(['cpf' => $request->cpf])->first();
        if(!$user) {
             response()->json(["error" => "CPF não vinculado a um usuário!"]);
        }
        $request->cpf;
        $credentials = User::where(['cpf' => $request->cpf])->first();
        $data = [
            'email' => $credentials->email
        ];

        Password::sendResetLink($data);
        return response()->json(["success" => "Link foi enviado para o e-mail"]);

    }
    public function reset(ResetPasswordRequest $request)
    {
        $status = Password::reset($request->validated(), function ($user, $password) {
            $user->password = $password;
            $user->save();
        });

        if ($status == Password::INVALID_TOKEN) {
            return $this->respondByBadRequest();
        }
        return $this->respondWithMessage("Senha alterada com sucesso!");
    }
}