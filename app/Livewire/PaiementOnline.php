<?php

namespace App\Livewire;

use App\Services\SchoolsServices;

use Livewire\Component;
use WireUi\Traits\Actions;
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;
use Defuse\Crypto\Exception\EnvironmentIsBrokenException;


class PaiementOnline extends Component
{

    use Actions;
    public $data = [];
    public $allData = [];
    public $isPayed = false;
    public $eleveId = null;


    public $comboEleve = [];
    public function mount()
    {
        $this->getData();
        $this->getListeEleve();
    }

    public function getData()
    {

        $data = SchoolsServices::getListPaiements($this->eleveId);
        $this->data = $data;
        $this->allData = $data;

    }
    public function refresh()
    {

        $this->eleveId = null;
        $this->getData();
    }



    public function updatedIsPayed()
    {

        $this->data = array_filter($this->allData, function ($element) {
            if ($this->isPayed) {
                return $element['is_paid'] == 1;
            } else {
                return $element['is_paid'] == 0;
            }
        });
    }
    public function payer($index)
    {
        $url = "https://epaiement.modelschool.dz/Controllers/EspaceParentsController.php";
        $data = $this->data[$index];
        $order_id = $data['contract_paiement_id'];
        $name = $data['eleve'];
        $montant = $data['montant_reste'];

        // Encode the parameters for the URL
        $urlParams = http_build_query([
            'order_id' => $order_id,
            'name' => $name,
            'montant' => $montant,
        ]);

        // Append the parameters to the URL
        $redirectUrl = $url . '?' . $urlParams;

        $this->redirect($redirectUrl);
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

        $this->getData();
    }

    public function render()
    {
        return view('livewire.paiement-online');
    }
}
