<?php

namespace App\Http\Controllers;

use App\Entities\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{

    /**
     * Find All @cities
     *
     * @return mixed
     */
    public function index($offset) {

        if ($offset == "null"){
            $cities = City::with('country')->get();
            return $cities;
        }

        $citiesCount = City::count();
        $cities = City::with('country')->take($offset)->get();

        return array("count" => $citiesCount, "cities" => $cities);
    }

    /**
     * Find by Id
     *
     * @param $cityId
     * @return mixed
     */
    public function show($cityId) {
        $city = City::with('country')->findOrfail($cityId);

        return $city;
    }

    /**
     * Store City
     *
     * @param Request $request
     * @return City
     */
    public function store(Request $request) {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'country_id' => 'required|exists:cnt_country,id'
        ]);

        if($validator->passes()){

            $city = new City();

            $city->name = $request->get('name');
            $city->country_id = $request->get('country_id');

            $city->save();

            return $city;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Update City
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'country_id' => 'required|exists:cnt_country,id'
        ]);

        if($validator->passes()){

            $city = City::findOrfail($id);

            $city->name = $request->get('name');
            $city->country_id = $request->get('country_id');

            $city->update();

            return $city;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Delete City
     *
     * @param $id
     */
    public function destroy($id) {
        $city = City::findOrfail($id);

        $city->delete();
    }
}