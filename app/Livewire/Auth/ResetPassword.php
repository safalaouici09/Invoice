<?php

namespace App\Livewire\Auth;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class ResetPassword extends Component
{
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';

    public $urlID = '';

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6|same:passwordConfirmation'
    ];

    public function mount($id)
    {
        $existingUser = User::find($id);
        $this->urlID = intval($existingUser->id);
    }

    public function resetPassword()
    {
        $this->validate();
        $existingUser = User::where('email', $this->email)->first();
        if ($existingUser && $existingUser->id == $this->urlID) {
            $existingUser->update([
                'password' => Hash::make($this->password)
            ]);
            redirect('login')->with('status', 'Your password has been reset!');
        } else {
            return back()->with('email', "We could not find any user with that email address.");
        }
    }

    public function render()
    {
        return view('livewire.auth.reset-password');
    }
}
