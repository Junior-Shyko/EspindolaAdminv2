<?php

namespace App\Repository\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Repository\User\SurveyRepositoryInterface;

class UserRepository
{
    public function getUserAndMeta($id)
    {
        return User::leftJoin('user_meta', 'users.id', '=', 'user_meta.user_id')
                ->leftJoin('teams', 'users.id', '=', 'teams.user_id')
                ->select('users.*', 'user_meta.*', 'teams.*', 'teams.name as nameTeam')
                ->where('users.id' , '=', $id)->first();
    }
}