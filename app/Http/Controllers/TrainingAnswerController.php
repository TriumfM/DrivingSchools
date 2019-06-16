<?php

namespace App\Http\Controllers;

use App\Entities\TrainingAnswer;
use App\Http\Requests\TrainingAnswerSaveRequest;
use App\Http\Requests\TrainingAnswerUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrainingAnswerController extends Controller
{

    /**
     * Find All
     *
     * @return mixed
     */
    public function index()
    {
        return TrainingAnswer::get();
//        $arrayFront = array('id' =>'1', 'solution' => 'Jo');
//        $answers = array('id' =>'1', 'solution' => 'Po');
//
////        $answers = TrainingAnswer::all(array('id', 'solution'));
////        $answers->makeVisible('solution')->toArray();
//
//        $diff = array_diff($answers, $arrayFront);
//
//        return $diff;
    }

    /**
     * Find by Id
     *
     * @param $answerId
     * @return mixed
     */
    public function show($answerId) {
        $answer = TrainingAnswer::findOrfail($answerId);

        return $answer;
    }

    /**
     * Store Answer
     *
     * @param TrainingAnswerSaveRequest $request
     * @return TrainingAnswer
     */
    public function store(TrainingAnswerSaveRequest $request)
    {
        $response = null;
        $answers = $request->json('answers');

        foreach($answers as $data)
        {
            $answer = new TrainingAnswer();

            $answer->name = $data['name'];
            $answer->solution = $data['solution'];
            $answer->question_id = $data['question_id'];

            $response[] = $answer->save();
        }

        return $response;
    }

    /**
     * Update Answer
     *
     * @param TrainingAnswerUpdateRequest $request
     * @param $question_id
     * @return mixed
     */
    public function update(TrainingAnswerUpdateRequest $request, $question_id)
    {
        $response = null;
        $answers = $request->json('answers');

        foreach($answers as $data) {
            $answer = TrainingAnswer::where('question_id', $question_id)->findOrfail($data['id']);

            $answer->name = $data['name'];
            $answer->solution = $data['solution'];

            $answer->update();
            $response[] = $answer;
        }

        return $response;

    }


    /**
     * Delete Answer
     *
     * @param $id
     */
    public function destroy($id) {
        $answer = TrainingAnswer::findOrfail($id);

        $answer->delete();
    }

    public function showByQuestionId($question_id)
    {
        return TrainingAnswer::where('question_id', $question_id)->get();
    }
}
