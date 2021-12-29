<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use App\Http\Services\CustomerService;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class CustomerController extends BaseController
{
    public function __construct(CustomerService $customerService) {
        $this->customerService = $customerService;
    }
    public function index() {
        $customers = $this->customerService->getAll();
        return view('admin.customer.index', compact('customers'));
    }
    public function showLogin() {
        return view('ogani.user.login');
    }
    public function showRegister() {
        return view('ogani.user.register');
    }
    public function register(CreateCustomerRequest $request){
        $this->customerService->store($request);
        return redirect()->route('customer.showLogin');
    }
    public function login(CreateCustomerRequest $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('ogani.index');
        }
        return redirect()->route('customer.showLogin');
    }
    public function logout(){
        Auth::logout();
        return back();
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