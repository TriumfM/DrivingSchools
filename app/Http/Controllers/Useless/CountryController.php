<?php

namespace App\Http\Controllers;

use App\Entities\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{

    /**
     * Find All
     *
     * @return mixed
     */
    public function index($offset){

        if ($offset == "null"){
            $countries = Country::get();
            return $countries;
        }

        $countriesCount = Country::count();
        $countries = Country::take($offset)->get();

        return array("count" => $countriesCount, "countries" => $countries);
    }

    /**
     * Find by Id
     *
     * @param $countryId
     * @return mixed
     */
    public function show($countryId){
        $country = Country::with('cities')->findOrfail($countryId);

        return $country;
    }

    /**
     * Store Country
     *
     * @param Request $request
     * @return Country
     */
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if($validator->passes()){

            $country = new Country();

            $country->name = $request->get('name');

            $country->save();

            return $country;

        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Update Country
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if($validator->passes()){

            $country = Country::findOrfail($id);

            $country->name = $request->get('name');

            $country->update();

            return $country;

        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Delete Country
     *
     * @param $id
     */
    public function destroy($id){
        $country = Country::findOrfail($id);

        $country->delete();
    }

}