<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodBanksController extends Controller
{
    //
    public function getFoodBanks() {
        $url = "js/foodbank.json"; // path to your JSON file
        $data = file_get_contents($url); // put the contents of the file into a variable
        $foodbanks = json_decode($data,false); // decode the JSON feed
        //console.log($url);
        // var_dump($foodbanks);
         //var_dump($foodbanks['FoodBanks'][0]);
echo $foodbanks['FoodBanks'];



        // foreach ($foodbanks['FoodBanks'] as $foodbank) {
            //var_dump($foodbanks['FoodBanks'][0]['Arvada'].Name);
            //print_r(array_values($foodbanks));
             //echo $foodbanks['Foodbanks']->[0] . '<br>';
        // }
        return 0;
    }
}