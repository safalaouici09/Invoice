<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class SchoolsServices
{


    public static function getListEleves()
    {
        $server = env('SERVER', 'https://isodev.datafirst-dz.com');
        $app = env('APP', '/ws/public');
        $url = "$server$app";
        $user = Auth::user();
        $parentId = $user->parent_id;
        $cookieHeaders = json_decode($user->cookies, true);

        $response = Http::withHeaders([
            'X-CSRF-TOKEN' => $user->token,
            'Cookie' => implode('; ', $cookieHeaders),
            'User-Agent' => 'dio',
            'Connection' => 'keep-alive',
            'Accept-Encoding' => 'gzip, deflate, br',
        ])->post("$url/api/schoolEleve", [
                    '_token' => $user->token,
                    'parent_id' => $parentId,
                ]);


        //'9039'
        if (!$response->failed()) {

            $data = $response->json();

            if (isset($data['success']) && $data['success'] === true) {

                return $data['data'];
            } else {
                return [];

            }
        } else {
            return [];
        }
    }

   /* public static function getListPaiements()
    {
        $server = env('SERVER', 'https://isodev.datafirst-dz.com');
        $app = env('APP', '/ws/public');
        $url = "$server$app";
        $user = Auth::user();
        
        $cookieHeaders = json_decode($user->cookies, true);

        $response = Http::withHeaders([
            'X-CSRF-TOKEN' => $user->token,
            'Cookie' => implode('; ', $cookieHeaders),
            'User-Agent' => 'dio',
            'Connection' => 'keep-alive',
            'Accept-Encoding' => 'gzip, deflate, br',
        ])->post("$url/Paiements", [
                    '_token' => $user->token,
                   
                ]);


        //'9039'
        if (!$response->failed()) {

            $data = $response->json();

            if (isset($data['success']) && $data['success'] === true) {

                return $data['data'];
            } else {
              
                return $response->failed();

            }
        } else {                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
            return $response;
        }
   }*/
   public static function getListPaiements()
{
    $server = env('SERVER', 'https://isodev.datafirst-dz.com');
    $app = env('APP', '/ws/public');
    $url = "$server$app/api/Paiements"; // Include the endpoint here
    $user = Auth::user();

    $cookieHeaders = json_decode($user->cookies, true);

    $response = Http::withHeaders([
        'X-CSRF-TOKEN' => $user->token,
        'Cookie' => implode('; ', $cookieHeaders),
        'User-Agent' => 'dio',
        'Connection' => 'keep-alive',
        'Accept-Encoding' => 'gzip, deflate, br',
    ])->post($url, [
        '_token' => $user->token,
    ]);

    if (!$response->failed()) {
        $data = $response->json();

        if (isset($data['success']) && $data['success'] === true) {
            return $data['data'];
        } else {
            return $response->failed();
        }
    } else {
        return $response;
    }
}

    public static function getListAbsences($date_debut, $date_fin)
    {
        $server = env('SERVER', 'https://isodev.datafirst-dz.com');
        $app = env('APP', '/ws/public');
        $url = "$server$app";
        $user = Auth::user();
        $parentId = $user->parent_id;

        $cookieHeaders = json_decode($user->cookies, true);

        $response = Http::withHeaders([
            'X-CSRF-TOKEN' => $user->token,
            'Cookie' => implode('; ', $cookieHeaders),
            'User-Agent' => 'dio',
            'Connection' => 'keep-alive',
            'Accept-Encoding' => 'gzip, deflate, br',
        ])->post("$url/api/schoolCoursPresence", [
                    '_token' => $user->token,
                    'parent_id' => $parentId,
                    'date_debut' => $date_debut,
                    'date_fin' => $date_fin,
                    'onlySignaled' => 1

                ]);

        if (!$response->failed()) {
            $data = $response->json();

            if (isset($data['success']) && $data['success'] === true) {

                return $data['data'];
            } else {
                return [];

            }
        } else {
            return [];
        }



    }
    public static function getEmploiDuTemps($classe_id)
    {
        $server = env('SERVER', 'https://isodev.datafirst-dz.com');
        $app = env('APP', '/ws/public');
        $url = "$server$app";
        $user = Auth::user();
        $parentId = $user->parent_id;

        $cookieHeaders = json_decode($user->cookies, true);

        $response = Http::withHeaders([
            'X-CSRF-TOKEN' => $user->token,
            'Cookie' => implode('; ', $cookieHeaders),
            'User-Agent' => 'dio',
            'Connection' => 'keep-alive',
            'Accept-Encoding' => 'gzip, deflate, br',
        ])->post("$url/api/schoolEmploiDuTemps", [
                    '_token' => $user->token,
                    'classe_id' => $classe_id,
                    'new_emploi' => 1

                ]);

        if (!$response->failed()) {
         
            $data = $response->json();

            if (isset($data['success']) && $data['success'] === true) {

                return $data['data'];
            } else {
                return [];

            }
        } else {
            return [];
        }





    }

}