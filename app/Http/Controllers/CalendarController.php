<?php

namespace App\Http\Controllers;

use App\Entities\Calendar;
use App\Entities\Instructor;
use App\Entities\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalendarController extends Controller
{

    /**
     * Find All
     *
     * @return mixed
     */
    public function index()
    {
        $calendars = Calendar::with('students', 'instructors')->get();

        return $calendars;
    }

    /**
     * Find by Id
     *
     * @param $calendarId
     * @return mixed
     */
    public function show($calendarId) {
        $calendar = Calendar::with('students', 'instructors')->findOrfail($calendarId);

        return $calendar;
    }

//    public function create()
//    {
//        return view('pages.dashboard', [
//            'students' => Student::get()->pluck('full_name', 'id'),
//            'instructors' => Instructor::get()->pluck('full_name', 'id')
//        ]);
//    }

    /**
     * Store Calendar
     *
     * @param Request $request
     * @return Calendar
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'instructor_id' => 'required|exists:int_instructor,id',
            'student_id' => 'required|exists:std_student,id'

    ]);
        if($validator->passes()){

            $calendar = new Calendar;

            $calendar->title = $request->get('title');
            $calendar->start = $request->get('start');
            $calendar->end = $request->get('end');
            $calendar->instructor_id = $request->get('instructor_id');
            $calendar->student_id = $request->get('student_id');

            $calendar->save();

//            $calendar->students()->attach($calendar->student_id);
//            $calendar->instructors()->attach($calendar->instructor_id);

            return $calendar;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Update Calendar
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'instructor_id' => 'required|exists:int_instructor,id',
            'student_id' => 'required|exists:std_student,id'
        ]);

        if($validator->passes()){

            $calendar = Calendar::findOrfail($id);

            $calendar->title = $request->get('title');
            $calendar->start = $request->get('start');
            $calendar->instructor_id = $request->get('instructor_id');
            $calendar->student_id = $request->get('student_id');

            $calendar->update();

            return $calendar;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }


    /**
     * Delete Calendar
     *
     * @param $id
     */
    public function destroy($id) {
        $calendar = Calendar::findOrfail($id);

        $calendar->delete();
    }
}
