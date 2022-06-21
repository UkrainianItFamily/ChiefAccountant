<?php


namespace App\Http\Controllers\Admin;

use App\Actions\User\DeleteUserAction;
use App\Actions\User\DeleteUserRequest;
use App\Actions\User\GetAllUserListAction;
use App\Actions\User\GetAllUserListRequest;
use App\Actions\User\GetUserListByIdAction;
use App\Actions\User\GetUserListByIdRequest;
use App\Actions\User\UpdateUserListAdminAction;
use App\Actions\User\UpdateUserListAdminRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserByAdminValidateRequest;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function getUserListPage(GetAllUserListAction $getAllUserAction, Request $request)
    {

        $users = $getAllUserAction
            ->execute(new GetAllUserListRequest(
                (int) $request->input('id'),
                $request->input('email'),
                $request->input('phone'),
            ))
            ->getResponse();

        return view('pages.admin.userList.user-list-page', compact('users'));
    }

    public function getEditUserPage(GetUserListByIdAction $userByIdAction, string $id)
    {
        $user =  $userByIdAction->execute(new GetUserListByIdRequest(
            (int)$id)
        )->getResponse();

        return view('pages.admin.userList.user-edit-page', compact('user'));
    }

    public function updateUser(UpdateUserByAdminValidateRequest $request, UpdateUserListAdminAction $updateUserAction)
    {
        $updateUserAction->execute(new UpdateUserListAdminRequest(
            (int)  $request->input('id'),
            $request->input('password_confirmation'),
            $request->input('email'),
            $request->input('is_admin'),
            $request->input('date_from'),
            $request->input('date_to')
        ));

        return redirect()->route('admin.getEditUserPage', $request->input('id'))->with('message','Сохранено');
    }

    public function deleteUser(DeleteUserAction $deleteUserAction, string $id)
    {
        $deleteUserAction->execute(
            new DeleteUserRequest(
                (int)$id
            )
        );

        return back()->with(['success' => 'Успешно удалено']);
    }
}
