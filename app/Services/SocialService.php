<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SocialService
{
    public function findOrCreateSocialUser($userFromSocial)
    {
        $email = $userFromSocial->getEmail();
        $name = $userFromSocial->getName();
        $explodeName = explode(' ', $name);
        if (!isset($explodeName[0]) || $explodeName[0] == '') {
            $firstName = 'no Name';
        } else {
            $firstName = $explodeName[0];
        }
        $lastName = $explodeName[1] ?? null;
        $user = User::where('email', $email)->first();
        if(!isset($user) || !($user instanceof User)){
            return User::create([
                'firstname' => $firstName,
                'lastname'  => $lastName,
                'email'     => $email,
                'password'  => Hash::make('123'),
                'photo'     => $userFromSocial->getAvatar(),
            ]);
        }
        return $user;
    }

}
