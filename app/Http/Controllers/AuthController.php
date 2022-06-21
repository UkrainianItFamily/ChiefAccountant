<?php

namespace App\Http\Controllers;

use App\Actions\Auth\ConfirmedEmailAction;
use App\Actions\Auth\LoginAction;
use App\Actions\Auth\LoginRequest;
use App\Actions\Auth\LogoutAction;
use App\Actions\Auth\ResetPasswordAction;
use App\Actions\Auth\ResetPasswordRequest;
use App\Actions\Auth\SendLinkForgotPasswordAction;
use App\Actions\Auth\SendLinkForgotPasswordRequest;
use App\Actions\User\AddUserAction;
use App\Actions\User\AddUserRequest;
use App\Http\Requests\ForgotPassword\ResetPasswordValidateRequest;
use App\Http\Requests\ForgotPassword\ToForgotPasswordValidateRequest;
use App\Http\Requests\User\CreateUserValidateRequest;
use App\Http\Requests\User\LoginUserValidateRequest;

class AuthController extends Controller
{
    public function getForgotPasswordPage()
    {
        return (view('pages.auth.forgot-password-page'));
    }

    public function sendForgotPasswordLink(SendLinkForgotPasswordAction $action, ToForgotPasswordValidateRequest $request)
    {
        $action->execute(
            new SendLinkForgotPasswordRequest(
                $request->input('username'),
            )
        );

        return back()
            ->with(['success' => "Код востановления пароля отправлен на почту"]);
    }

    public function getResetPasswordForm($email, $token)
    {
        return view('pages.auth.reset-password-page', ['token' => $token, 'email' => $email]);
    }

    public function resetPassword(ResetPasswordValidateRequest $request, ResetPasswordAction $resetPasswordAction)
    {
        $resetPasswordAction->execute(
            new ResetPasswordRequest(
                $request->input('token'),
                $request->input('email'),
                $request->input('password')
            )
        );

        return $this->successResponseRedirect('Новый пароль установлен', 'user.loginPage');
    }

    public function getLoginPage()
    {
        return view('pages.auth.login-page');
    }

    public function authUser(LoginUserValidateRequest $request, LoginAction $loginAction)
    {
        $loginAction->execute(
            new LoginRequest(
                $request->input('username'),
                $request->input('password'),
                $request->input('remember')
            )
        );

        return view('index');
    }

    public function getRegistrationPage()
    {
        return view('pages.auth.registration-page');
    }

    public function logout(LogoutAction $logoutAction)
    {
        $logoutAction->execute();

        return redirect()
            ->route('index');
    }

    public function registrationUser(CreateUserValidateRequest $request, AddUserAction $addUserAction, ConfirmedEmailAction $confirmedEmailAction): \Illuminate\Http\RedirectResponse
    {
        $user = $addUserAction->execute(
            new AddUserRequest(
                $request->input('name'),
                $request->input('surname'),
                $request->input('email'),
                $request->input('password'),
                $request->input('is_entity'),
                $request->input('company_name'),
                $request->input('phone'),
                $request->input('company_address'),
                $request->input('company_id'),
                $request->input('company_code'),
            )
        )->getResponse();

        return $this->successResponseRedirect('Проверьте почту для завершения регистрации', 'user.loginPage');
    }
}
