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
    public $data = [];
    public $chiffreAffaire;
        public $chiffreAffaireDeclarer;
 public $percentage = 1;
    public $allData = [];
public $paiementTracable =[] ; 
public $paiementNonTracable =[] ;
protected $listeners = ['calculatePercentage']; 
    public function mount()
    {
        $this->getData();
    }
    public function getData()
    {
        $data = SchoolsServices::getListPaiements();
        $this->data = $data;
        $this->allData = $data;
    
        $paiementNonTracable = []; // Tableau pour les paiements avec mode_paiement_id = 1
        $paiementTracable = []; // Tableau pour les paiements avec autre mode_paiement_id
    
        foreach ($data as $item) {
            if ($item['mode_paiement_id'] == 1) {
                $paiementNonTracable[] = $item;
            } else {
                $paiementTracable[] = $item;
            }
        }
    
        // Vous pouvez affecter ces tableaux à des variables de classe si vous en avez besoin dans votre composant
        $this->paiementNonTracable= $paiementNonTracable;
        $this->paiementTracable= $paiementTracable;
    }
    
    public function calculatePercentage()
    
    {   //dd($this->chiffreAffaireDeclarer  );
      

        
        if ($this->chiffreAffaire != 0) {
            $this->percentage = number_format($this->chiffreAffaireDeclarer * 100 / $this->chiffreAffaire, 2);
           // dd($this->percentage );
        } else {
          
            $this->percentage = 1 ;
        }}
    
    public function render()
    { 

        return view('livewire.simulateur');
    }






}
