<?php

namespace App\Http\Controllers;

use App\Actions\EntrepreneurialActivity\GetAllListEntrepreneurialActivityAction;
use App\Actions\User\GetUserByIdAction;
use App\Actions\User\GetUserByIdRequest;
use App\Actions\User\SendUserContractToEmailAction;
use App\Actions\User\SendUserContractToEmailRequest;
use App\Actions\User\Admin\UpdateUserAccessAction;
use App\Actions\User\Admin\UpdateUserAccessRequest;
use App\Actions\User\UpdateUserAction;
use App\Actions\User\UpdateUserPasswordAction;
use App\Actions\User\UpdateUserPasswordRequest;
use App\Actions\User\UpdateUserRequest;
use App\Http\Requests\User\SendUserContractToEmailValidateRequest;
use App\Http\Requests\User\UpdateUserAccessValidateRequest;
use App\Http\Requests\User\UpdateUserPasswordValidateRequest;
use App\Http\Requests\User\UpdateUserValidateRequest;

class PersonalController
{
    public function getPersonalPage(GetUserByIdAction $getUserByIdAction, GetAllListEntrepreneurialActivityAction $getAllListEntrepreneurialActivityAction, string $id)
    {
          $getUserById = $getUserByIdAction->execute(new GetUserByIdRequest((int)$id))->getResponse();
          $entrepreneurialActivity = $getAllListEntrepreneurialActivityAction->execute()->getResponse();

          return view('pages.personal.personal-info', compact('getUserById', 'entrepreneurialActivity'));
    }

    public function updatePersonalData(UpdateUserValidateRequest $request, UpdateUserAction $updateUserAction, string $id)
    {
        $updateUserAction->execute(new UpdateUserRequest(
            (int) $id,
            $request->input('name'),
            $request->input('surname'),
            $request->input('phone'),
            $request->input('company_code'),
            $request->input('company_name'),
            $request->input('company_id'),
            $request->input('password'),
            $request->input('entrepreneurial_activity')
        ))->getResponse();

        return redirect()->route('user.personalPage', $id)->with('success','Сохранено');
    }

    public function getEditPasswordPage()
    {
        return view('pages.personal.personal-edit-password-page');
    }

    public function updatePersonalPassword(UpdateUserPasswordValidateRequest $request, UpdateUserPasswordAction $action, string $id)
    {
        $action->execute(new UpdateUserPasswordRequest(
            (int) $id,
            $request->input('old_password'),
            $request->input('new_password')
        ))->getResponse();

        return redirect()->route('user.editPasswordPage', $id)->with('success','Сохранено');
    }

    public function getFavoritesPage()
    {
        return view('pages.personal.personal-favorites-page');
    }

    public function updateAccessPersonal(UpdateUserAccessAction $action, UpdateUserAccessValidateRequest $request, string $id)
    {
        $action->execute(new UpdateUserAccessRequest(
            (int) $id,
            $request->input('number_contract'),
            $request->input('date_from'),
            $request->input('date_to')
        ))->getResponse();

        return redirect()->route('user.personalPage', $id)->with('success','Сохранено');
    }

    public function sendContractToEmail(SendUserContractToEmailAction $action, SendUserContractToEmailValidateRequest $request)
    {
        $action->execute(new SendUserContractToEmailRequest(
            (int) $request->input('id'),
            $request->input('description')
        ));

        return redirect()->back()->with('success', 'Ваше сообщение успешно отправлено');
    }
}
