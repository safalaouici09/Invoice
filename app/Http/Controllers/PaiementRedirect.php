<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaiementRedirect
{
    public function index(Request $request)
    {
        try {
            DB::insert("insert into tranche_payed (tranche_id,is_paid,montant,status,satim_commande_id) values (?,1,?,?,?)",
                [
                    $request->tranche_id,
                    $request->montant_commande ?? 0,
                    $request->status ?? 0,
                    $request->num_commande
                ]);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}