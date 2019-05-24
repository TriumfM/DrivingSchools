<?php

namespace App\Http\Controllers;

use App\Entities\Calendar;
use App\Entities\Instructor;
use Illuminate\Http\Request;

class CustomFiltersController extends Controller
{
     public function eventsInstructors(Request $request){

         $arrayInst =  json_decode($request->get('instructors'), true);
         $arrayStd = json_decode($request->get('students'), true);


         $events = array();

         if($arrayInst != null){
             foreach($arrayInst as $ins){
                 $calendarEvent = Calendar::with('students')->where('instructor_id',$ins )->get();

                 array_push($events, $calendarEvent);
             }
         }else if($arrayStd != null){
             foreach($arrayStd as $std){
                 $calendarEvent = Calendar::where('student_id',$std )->get();

                 array_push($events, $calendarEvent);
             }
         }

         return $events;
     }

     public function tableFilter(Request $request, $offset){

        $namespace = 'App\Entities\\'.$request->json('table');

        if ($request->json('table') == "User") {
            $namespace = 'App\\'.$request->json('table');
        }

        if ($request->json('relations') == null){

            $filterCount = $namespace::where($request->json('column'), 'like', '%' . $request->json('value'). '%')->take($offset)->count();
            $filterItems = $namespace::where($request->json('column'), 'like', '%' . $request->json('value'). '%')->take($offset)->get();

            return array("count" => $filterCount, "items" => $filterItems);
        }

        $filterCount = $namespace::where($request->json('column'), 'like', '%' . $request->json('value'). '%')->take($offset)->count();
        $filterItems = $namespace::with($request->json('relations'))->where($request->json('column'), 'like', '%' . $request->json('value'). '%')->take($offset)->get();

        return array("count" => $filterCount, "items" => $filterItems);

     }
}
