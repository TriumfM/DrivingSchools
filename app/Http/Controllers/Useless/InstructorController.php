<?php

namespace App\Http\Controllers;

use App\Entities\Instructor;
use App\Entities\Student;
use App\Entities\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\In;

class InstructorController extends Controller
{
    /**
     * InstructorController constructor.
     *
     * @param DocumentController $documentable
     */
    public function __construct(DocumentController $documentable){
        $this->documentable = $documentable;
    }
    /**
     * Find All
     *
     * @return mixed
     */
    public function index($offset)
    {
        if ($offset == "null"){
            $instructors = Instructor::with('students', 'vehicles', 'events', 'documents', 'city')->get();
            return $instructors;
        }

        $instructorsCount = Instructor::count();
        $instructors = Instructor::with('students', 'vehicles', 'events', 'documents', 'city')->take($offset)->get();

        return array("count" => $instructorsCount, "instructors" => $instructors);
    }

    /**
     * Find by Id
     *
     * @param $instructorId
     * @return mixed
     */
    public function show($instructorId)
    {
        $instructor = Instructor::with('students', 'vehicles', 'events', 'documents', 'city')->findOrfail($instructorId);

        return $instructor;
    }

    public function details ($instructorId){
        return view('admin.pages.instructors.details', array($instructorId));
    }

    /**
     * Store Instructor
     *
     * @param Request $request
     * @return Instructor
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
            'email' => 'required|unique:int_instructor,email',
            'id_number' => 'required|unique:int_instructor,id_number',
            'address' => 'required',
            'mobile' => 'required',
            'phone' => 'required',
            'gender' => 'in:male,female|required',
//            'student_id' => 'required|exists:std_student,id',
//            'vehicle_id' => 'required|exists:veh_vehicle,id',
            'city_id' => 'required|exists:cnt_city,id'
        ]);

        if ($validator->passes()) {

            $instructor = new Instructor();

            $instructor->first_name = $request->get('first_name');
            $instructor->last_name = $request->get('last_name');
            $instructor->birthday = $request->get('birthday');
            $instructor->email = $request->get('email');
            $instructor->id_number = $request->get('id_number');
            $instructor->address = $request->get('address');
            $instructor->mobile = $request->get('mobile');
            $instructor->phone = $request->get('phone');
            $instructor->gender = $request->get('gender');
            $instructor->city_id = $request->get('city_id');
//            $student_id = $request->get('student_id');
//            $vehicle_id = $request->get('vehicle_id');

//            $destinationPath = public_path() . '/fonix/images/instructors/';
//
//            $imageName = $instructor->email . '.' .
//                $request->file('photo')->getClientOriginalExtension();
//
//            $request->file('photo')->move($destinationPath, $imageName);
//
//            $instructor->photo = $imageName;

            $instructor->save();
//
//            $this->documentable->documentable($instructor->id, $request);

            return $instructor;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }


    /**
     * Update Instructor
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $instructor = Instructor::findOrfail($id);

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
            'email' => 'required|unique:int_instructor,email,'.$instructor->id,
            'id_number' => 'required|unique:int_instructor,id_number,'.$instructor->id,
            'address' => 'required',
            'mobile' => 'required',
            'phone' => 'required',
            'gender' => 'in:male,female'
        ]);

        if ($validator->passes()) {

            $instructor->first_name = $request->get('first_name');
            $instructor->last_name = $request->get('last_name');
            $instructor->birthday = $request->get('birthday');
            $instructor->email = $request->get('email');
            $instructor->id_number = $request->get('id_number');
            $instructor->address = $request->get('address');
            $instructor->mobile = $request->get('mobile');
            $instructor->phone = $request->get('phone');
            $instructor->gender = $request->get('gender');
            $instructor->city_id = $request->get('city_id');

            $instructor->update();

            return $instructor;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Delete Instructor
     *
     * @param $id
     */
    public function destroy($id)
    {
        $instructor = Instructor::findOrfail($id);

        $instructor->delete();
    }

    public function stdInstructor($instructorId, $studentId)
    {

        $inst = Instructor::findOrfail($instructorId);

        $inst->students()->attach($studentId);

        return $inst->load('students');

    }

    public function vehInstructor($instructorId, $vehicleId)
    {

        $inst = Instructor::findOrfail($instructorId);

        $inst->vehicles()->attach($vehicleId);

        return $inst->load('vehicles');

    }
}