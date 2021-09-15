<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
class PokemonController extends Controller
{   
    public function getPokemonByName(Request $request) {
        $client = new Client();
        $name = strtolower($request->input('pokemon-name'));

        $headers = [
            'Content-type' => 'application/x-www-form-urlencoded'
        ];
        $url = 'https://pokeapi.co/api/v2/pokemon/'.$name;
        // Send Request to Spotify Auth API
        $response = $client->request('GET', $url, 
        [
            'headers' => $headers
        ]);
        
        $pokemon = json_decode($response->getBody());
        return view('index')->with('pokemon',$pokemon);
    }

    public function homePokemon() {
        $client = new Client();
        $name = "ditto";
        $headers = [
            'Content-type' => 'application/x-www-form-urlencoded'
        ];
        $url = 'https://pokeapi.co/api/v2/pokemon/'.$name;
        // Send Request to Spotify Auth API
        $response = $client->request('GET', $url, 
        [
            'headers' => $headers
        ]);
        
        $pokemon = json_decode($response->getBody());
        return view('index')->with('pokemon',$pokemon);
    }
}
