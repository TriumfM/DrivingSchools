<?php

namespace App\Http\Controllers;

use App\Entities\City;
use App\Entities\Medical;
use App\Entities\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{

    /**
     * StudentController constructor.
     *
     * @param PaymentController $payment
     * @param DocumentController $documentable
     */
    public function __construct(PaymentController $payment, DocumentController $documentable)
    {
        $this->payment = $payment;
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
            $students = Student::with('city', 'documents', 'events', 'payments.category')->get();
            return $students;
        }

        $studentsCount = Student::count();
        $students = Student::with('city', 'documents', 'events', 'payments.category')->take($offset)->get();

        return array("count" => $studentsCount, "students" => $students);
    }

    /**
     * Find by Id
     *
     * @param $studentId
     * @return mixed
     */
    public function show($studentId)
    {
        $student = Student::with('city', 'documents', 'events', 'payments.category')->findOrfail($studentId);

        return $student;
    }

    public function details($studentId)
    {
        return view('admin.pages.students.details', array($studentId));
    }

    /**
     * Store Student
     *
     * @param Request $request
     * @return Student
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'registration_date' => 'required',
            'registration_number' => 'required',
            'first_name' => 'required',
            'parent_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:std_student,email',
            'id_number' => 'required|unique:std_student,id_number',
            'birthday' => 'required',
            'profession' => 'required',
            'mobile' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'in:male,female|required',
            'city_id' => 'required|exists:cnt_city,id'

        ]);

        if ($validator->passes()) {

            $student = new Student();

            $student->registration_date = $request->get('registration_date');
            $student->registration_number = $request->get('registration_number');
            $student->first_name = $request->get('first_name');
            $student->parent_name = $request->get('parent_name');
            $student->last_name = $request->get('last_name');
            $student->email = $request->get('email');
            $student->id_number = $request->get('id_number');
            $student->birthday = $request->get('birthday');
            $student->profession = $request->get('profession');
            $student->mobile = $request->get('mobile');
            $student->phone = $request->get('phone');
            $student->address = $request->get('address');
            $student->gender = $request->get('gender');
            $student->city_id = $request->get('city_id');


//            $destinationPath = public_path() . '/fonix/images/students/';
//
//            $imageName = $student->email . '.' .
//                $request->file('photo')->getClientOriginalExtension();
//
//            $request->file('photo')->move($destinationPath, $imageName);
//
//            $student->photo = $imageName;
//
//
            $student->save();
//
//            if ($request->json('payment') != null) {
//                $this->payment->store($student->id, $request);
//
//            }
//            if($request->json('documents') != null){
//                $this->documentable->documentable($student->id, $request);
//            }

            return $student;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }


    /**
     * Update Student
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {

        $student = Student::findOrfail($id);

        $validator = Validator::make($request->all(), [
            'registration_date' => 'required',
            'registration_number' => 'required',
            'first_name' => 'required',
            'parent_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:std_student,email,'.$student->id,
            'id_number' => 'required|unique:std_student,id_number,'.$student->id,
            'birthday' => 'required',
            'profession' => 'required',
            'mobile' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'in:male,female|required',
            'city_id' => 'required|exists:cnt_city,id'
        ]);

        if ($validator->passes()) {

            $student->registration_date = $request->get('registration_date');
            $student->registration_number = $request->get('registration_number');
            $student->first_name = $request->get('first_name');
            $student->parent_name = $request->get('parent_name');
            $student->last_name = $request->get('last_name');
            $student->email = $request->get('email');
            $student->id_number = $request->get('id_number');
            $student->birthday = $request->get('birthday');
            $student->profession = $request->get('profession');
            $student->mobile = $request->get('mobile');
            $student->phone = $request->get('phone');
            $student->address = $request->get('address');
            $student->gender = $request->get('gender');
            $student->city_id = $request->get('city_id');

            $student->update();

            return $student;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Delete Student
     *
     * @param $id
     */
    public function destroy($id)
    {
        $student = Student::findOrfail($id);

        $student->delete();
    }
}