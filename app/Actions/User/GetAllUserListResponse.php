<?php


namespace App\Actions\User;

use Illuminate\Support\Collection;

class GetAllUserListResponse
{
    private Collection $users;

    public function __construct(Collection $users)
    {
        $this->users = $users;
    }

    public function getResponse(): Collection
    {
        return $this->users;
    }

}
