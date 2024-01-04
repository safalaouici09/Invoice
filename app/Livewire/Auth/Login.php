<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember_me = false;

    protected $rules = [
        'email' => 'required|email:rfc,dns',
        'password' => 'required',
    ];

    public function mount()
    {
        $this->fill(['email' => '2025', 'password' => '2025']);
    }

    public function login()
    {


        // URL and data for the POST request


        $server = env('SERVER', 'https://isodev.datafirst-dz.com');
        $app = env('APP', 'ws/public');
        $url = "$server$app";
        $response = Http::post('https://isodev.datafirst-dz.com/ws/public/parentLogin', [
            'username' => $this->email,
            'password' => $this->password,
        ]);
        $cookies = $response->cookies();
        $cookieHeaders = [];
        foreach ($cookies as $cookie) {
            $cookieHeaders[] = $cookie->getName() . '=' . $cookie->getValue();
        }


        //'9039'
        if ($response->failed()) {
            return $this->addError('email', 'failed to login');
        } else {
            $data = $response->json();

            if (isset($data['success']) && $data['success'] === true && isset($data['_token'])) {
                $token = $data['_token'];
                $userData = $data['data'];
                $user = User::where('email', '=', $this->email)->first();
                if ($user == null) {
                    User::create([
                        'email' => $this->email,
                        'name' => $userData->parent_id ?? 'not definded',
                        'password' => Hash::make($this->password),
                        'api_token' => $token,
                        'cookies' => json_encode($cookieHeaders),
                        'parent_id' => $userData['parent_id'],
                    ]);
                } else {
                    $user->parent_id = $userData['parent_id'];
                    $user->api_token = $token;
                    $user->cookies = json_encode($cookieHeaders);
                    $user->save();
                }
                if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
                    $user = User::where(["email" => $this->email])->first();
                    auth()->login($user, $this->remember_me);
                    return redirect()->intended('/dashboard');
                } else {
                    return $this->addError('email', trans('auth.failed'));
                }
            } else {
                return $this->addError('email', 'failed to login2');
            }
        }
        // if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
        //     $user = User::where(["email" => $this->email])->first();
        //     auth()->login($user, $this->remember_me);
        //     return redirect()->intended('/dashboard');
        // } else {
        //     return $this->addError('email', trans('auth.failed'));
        // }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
