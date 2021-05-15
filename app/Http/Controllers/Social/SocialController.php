<?php


namespace App\Http\Controllers\Social;


use App\Http\Controllers\Controller;
use App\Services\SocialService;
use Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    protected $supportedServices = ['vkontakte', 'facebook'];
    public function redirectToProvider($service)
    {
        if (!in_array($service, $this->supportedServices)){
            return redirect()->route('login')->with(['failed' => "Does`t exist $service method" ]);
        }
        return Socialite::driver($service)->redirect();
    }
    public function handleProviderCallback(SocialService $socService, string $service)
    {
        $user = Socialite::driver($service)->user();
        $result = $socService->findOrCreateSocialUser($user);
        if ($result){
            Auth::loginUsingId($result->id);
            return redirect()->route('login');
        }
        return back(400);
    }
}
