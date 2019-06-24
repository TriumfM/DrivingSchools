<?php

namespace App\Http\Controllers;

use App\Entities\TrainingAnswer;
use App\Entities\TrainingQuestion;
use App\Entities\TrainingTest;
use App\Http\Requests\TrainingTestSaveRequest;
use App\Http\Requests\TrainingTestUpdateRequest;
use App\Services\TrainingTestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Question\Question;

class TrainingTestController extends Controller
{

    private $service;

    public function __construct(TrainingTestService $service)
    {
        $this->service = $service;
    }

    /**
     * Find All
     *
     * @return mixed
     */
    public function index()
    {
        return $this->service->findAll();
    }

    /**
     * Find by Id
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->service->findById($id);
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

        $test->name = $request->json('name');

        return $this->service->save($test);
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

        return $this->service->update($test);
     }


    /**
     * Delete Test
     *
     * @param $id
     */
    public function destroy($id)
    {
      $this->service->delete($id);
    }


    public function studentIndex() {
        $tests = TrainingTest::get();

        return $tests;
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
    public function results(Request $request)
    {
       $studentAnswer = $request->all();
       $checkResults = array();
       $total = 0;

       foreach ($studentAnswer as $key => $value)
       {
           $answers = TrainingAnswer::where('question_id', $key)->where('solution', true)->pluck('id');

           if($this->identical_values($value, $answers->toArray()) ){
               $question = TrainingQuestion::where('id', $key)->first();
               $checkResults[] = (object) array('id'=> $question->id, 'name' => $question->name, 'flag' => true, 'points' => $question->points, 'win_points' => $question->points, 'student_answer' => $value, 'correct_answers' => $answers);
               $total += $question->points;
           }else{
               $question = TrainingQuestion::where('id', $key)->first();
               $checkResults[] = (object) array('id'=> $question->id ,'name' => $question->name, 'flag' => false, 'points' => $question->points, 'win_points' => 0,  'student_answer' => $value, 'correct_answers' => $answers);
           }
       }

       $resultFinal = array('total' => $total, 'questions' => $checkResults);

       return $resultFinal;
    }
}
