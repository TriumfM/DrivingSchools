<?php

namespace App\Http\Controllers;

use App\Entities\Instructor;
use App\Entities\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    /**
     * Find All
     *
     * @return mixed
     */
    public function index($offset)
    {
        $vehiclesCount = Vehicle::count();
        $vehicles = Vehicle::take($offset)->get();

        return array('count' => $vehiclesCount, 'vehicles' => $vehicles);
    }

    /**
     * Find by Id
     *
     * @param $vehicleId
     * @return mixed
     */
    public function show($vehicleId)
    {
        $vehicle = Vehicle::findOrfail($vehicleId);

        return $vehicle;
    }

    /**
     * Store Vehicle
     *
     * @param Request $request
     * @return Vehicle
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'registration' => 'required'

        ]);

        if ($validator->passes()) {

            $vehicle = new Vehicle();

            $vehicle->name = $request->get('name');
            $vehicle->registration = $request->get('registration');

            $vehicle->save();

            return $vehicle;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Update Vehicle
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'registration' => 'required'
        ]);

        if ($validator->passes()) {

            $vehicle = Vehicle::find($id);

            $vehicle->name = $request->json('name');
            $vehicle->registration = $request->json('registration');

            $vehicle->update();

            return $vehicle;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Delete Vehicle
     *
     * @param $id
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::findOrfail($id);

        $vehicle->delete();
    }
}
