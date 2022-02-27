<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;


class CountryStateCityController extends Controller
{
    public function getState()
    {
        $data['states'] = State::get(["name","id"]);
        return view('state-city',$data);
    }
    public function getCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }
}
