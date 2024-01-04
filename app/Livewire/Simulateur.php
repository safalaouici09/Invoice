<?php

namespace App\Livewire;


use App\Services\SchoolsServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Carbon\Carbon;


class   Simulateur extends Component
{

    

    public function render()
    {
        return view('livewire.simulateur');
    }






}
