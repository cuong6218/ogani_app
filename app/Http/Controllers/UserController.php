<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateLoginRequest;
use App\Http\Requests\CreateRegisterRequest;
use App\Http\Services\FlashMessage;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class UserController extends BaseController
{
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }
    public function index() {
        $users = $this->userService->getAll();
        return view('admin.user.index', compact('users'));
    }
    public function showLogin() {
        return view('ogani.user.login');
    }
    public function showRegister() {
        return view('ogani.user.register');
    }
    public function register(CreateRegisterRequest $request){
        $this->userService->store($request);
        (new FlashMessage)->notifyMsg($request, "Register success!");
        return redirect()->route('user.showLogin');
    }
    public function login(CreateLoginRequest $request) {
        $user = $this->userService->getUserByEmail($request->email);
        if(Hash::check($request->password, $user->password)){
            Auth::login($user);
            $request->session()->remove('password');
            (new FlashMessage)->notifyMsg($request, "Login success!");
            return redirect()->route('ogani.index');
        }
        (new FlashMessage)->notifyMsg($request, 'password is incorrect.', 'error');
        return redirect()->route('user.showLogin');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('user.showLogin');
    }
    public function loginOauth($drive) {
        return Socialite::driver($drive)->redirect();
    }
    public function callback($drive) {
        $oauthUser = Socialite::driver($drive)->user();
        $user = User::where('email', $oauthUser->email)->first();
        if ($drive == 'github'){
            if($user){
                $user->update(['github_token' => $oauthUser->token,
                                'github_refresh_token' => $oauthUser->refreshToken]);
            } else {
                $user = User::create([
                'name' => $oauthUser->name,
                'email' => $oauthUser->email,
                'github_id' => $oauthUser->id,
                'github_token' => $oauthUser->token,
                'github_refresh_token' => $oauthUser->refreshToken,
                ]);
            }
        } else if($drive == 'google'){
            if($user){
                $user->update(['google_token' => $oauthUser->token,
                                'google_refresh_token' => $oauthUser->refreshToken]);
            } else {
                $user = User::create([
                'name' => $oauthUser->name,
                'email' => $oauthUser->email,
                'google_token' => $oauthUser->token,
                'google_refresh_token' => $oauthUser->refreshToken,
                ]);
            }
        }
        Auth::login($user);
        return redirect()->route('ogani.index');
    }
}   