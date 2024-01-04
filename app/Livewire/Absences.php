<?php

namespace App\Livewire;


use App\Services\SchoolsServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Carbon\Carbon;


class Absences extends Component
{

    public $date_debut = null;
    public $date_fin = null;

    public $data = [];
    public $liste = [];
    public $allData = [];
    public $eleveId = null;
    public $comboEleve = [];
    public function mount()
    {
        $this->getListeEleve();

        $this->date_fin = Carbon::now()->format('Y-m-d');

        $this->date_debut = Carbon::parse($this->date_fin)->subMonth()->format('Y-m-d');
        $this->afficher();

    }

    public function getListeEleve()
    {


        $data = SchoolsServices::getListEleves();

        $tmp = [];
        foreach ($data as $eleve) {
            $tmp[] = ['name' => $eleve['nom'] . ' ' . $eleve['prenom'], 'id' => $eleve['eleve_id']];

        }
        $this->comboEleve = $tmp;


    }
    public function updatedEleveId()
    {
        if ($this->eleveId == null) {
            $this->data = $this->allData;
            return true;
        }

        $tmp = [];
        foreach ($this->allData as $absence) {
            if ($absence['eleve_id'] == $this->eleveId) {
                $tmp[] = $absence;
            }
        }
        $this->data = $tmp;
    }

    public function afficher()
    {


        $data = SchoolsServices::getListAbsences($this->date_debut, $this->date_fin);


        $this->data = $data;
        //dd($data);

        $this->allData = $data;


    }


    public function render()
    {
        return view('livewire.absences');
    }






}
