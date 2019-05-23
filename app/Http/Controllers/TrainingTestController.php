<?php

namespace App\Http\Controllers;

use App\Entities\TrainingAnswer;
use App\Entities\TrainingQuestion;
use App\Entities\TrainingTest;
use App\Http\Requests\TrainingTestSaveRequest;
use App\Http\Requests\TrainingTestUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Question\Question;

class TrainingTestController extends Controller
{

    /**
     * Find All
     *
     * @return mixed
     */
    public function index()
    {
        $tests = TrainingTest::with('questions.answers')->get();

        return $tests;
    }

    public function studentIndex() {
        $tests = TrainingTest::get();

        return $tests;
    }

    /**
     * Find by Id
     *
     * @param $testId
     * @return mixed
     */
    public function show($testId)
    {
        $test = TrainingTest::with('questions.answers')->findOrfail($testId);

        return $test;
    }

    /**
     * Store Test
     *
     * @param TrainingTestSaveRequest $request
     * @return TrainingTest
     */
    public function store(TrainingTestSaveRequest $request)
    {
        $test = new TrainingTest();

        $test->name = $request->get('name');

        $test->save();

        return $test;
    }

    /**
     * Update Test
     *
     * @param TrainingTestUpdateRequest $request
     * @param $id
     * @return mixed
     */
    public function update(TrainingTestUpdateRequest $request, $id)
    {
        $test = TrainingTest::findOrfail($id);

        $test->name = $request->json('name');

        $test->update();

        return $test;
     }


    /**
     * Delete Test
     *
     * @param $id
     */
    public function destroy($id)
    {
        $test = TrainingTest::findOrfail($id);

        $test->delete();
    }

     public function showById($testId)
    {
        $test = TrainingTest::with('questions.stdAnswers')->findOrfail($testId);

        return $test;
    }

    /**
     * Compare two arrays if are identical
     *
     * @param $arrayA
     * @param $arrayB
     * @return bool
     */
     public function identical_values( $arrayA , $arrayB ) {

        sort( $arrayA );
        sort( $arrayB );

        return $arrayA == $arrayB;
    }

    // Results
    public function results(Request $request, $testId)
    {
       $studentAnswer = $request->get('results');
       $checkResults = array();
       $total = 0;

       foreach ($studentAnswer as $key => $value)
       {
           $answers = TrainingAnswer::where('question_id', $value['key'])->where('solution', 'Po')->pluck('id');

           if($this->identical_values($value['value'], $answers->toArray()) ){
               $question = TrainingQuestion::where('id', $value['key'])->first();
               $checkResults[] = (object) array('id'=> $question->id, 'name' => $question->name, 'flag' => true, 'points' => $question->points, 'win_points' => $question->points);
               $total += $question->points;
           }else{
               $question = TrainingQuestion::where('id', $value['key'])->first();
               $checkResults[] = (object) array('id'=> $question->id ,'name' => $question->name, 'flag' => false, 'points' => $question->points, 'win_points' => 0);
           }
       }

       $resultFinal = array('total' => $total, 'questions' => $checkResults);

       return $resultFinal;
    }


}