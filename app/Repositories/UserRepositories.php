<?php

namespace App\Repositories;

use App\User;

class UserRepositories
{
    public function getOrCreateUserBySocData(\SocialiteProviders\Manager\OAuth2\User $userData, $socType){

        $user = User::query()->where('id_soc', $userData->getId())
                            ->where('soc_type', $socType)->first();
        if (empty($user)) {
            $user = User::create([
                'name' => $userData->getNickname(),
                'email' => $userData->getEmail(),
                'role' => 2,
                'password' => '',
                'id_soc' => $userData->getId(),
                'soc_type' => $socType,
            ]);
        }
        return $user;
    }
}
