<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\SchoolsServices;

class EmploiDuTemps extends Component
{
    public $comboEleve = [];
    public $data = [];
    public $allData = [];
    public $eleveId = null;
    public $classe_id = null;
    public $classe_name = '';
    public $classes = [];

    public function mount()
    {
        $this->getListeEleve();
        $this->getData();

    }
    public function getListeEleve()
    {



        $data = SchoolsServices::getListEleves();
        $tmp = [];

        foreach ($data as $eleve) {
            $tmp[] = ['name' => $eleve['nom'] . ' ' . $eleve['prenom'],
                'classe_id' => $eleve['classe_id'],
                'classe_designation' => $eleve['classe_designation']];
            $this->classes[$eleve['classe_id']] = $eleve['classe_designation'];

        }
        $this->classe_name = $tmp[0]['classe_designation'];
        $this->classe_id = $tmp[0]['classe_id'];
        $this->comboEleve = $tmp;

    }
    public function updatedClasseId()
    {
        $this->classe_name = $this->classes[$this->classe_id];
        $this->getData();
        return true;
        // $tmp = [];

        // foreach ($this->allData as $cours) {
        //     $tmpCours = [];
        //     foreach ($cours['cours'] as $k => $seance) {

        //         if ($seance['classe_id'] === $this->classe_id) {
        //             $tmpCours[] = $seance;
        //         }
        //     }

        //     $cours['cours'] = $tmpCours;
        //     $tmp[] = $cours;

        // }
        // $this->data = $tmp;
        // dd($this->data);
    }

    public function getData()
    {

        $data = SchoolsServices::getEmploiDuTemps($this->classe_id);
        $this->data = $data;
        //dd($this->data);



        $this->allData = $data;






    }























    public function render()
    {
        return view('livewire.emploi-du-temps');
    }
}
