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
        $arrayFront = array('id' =>'1', 'solution' => 'Jo');
        $answers = array('id' =>'1', 'solution' => 'Po');

//        $answers = TrainingAnswer::all(array('id', 'solution'));
//        $answers->makeVisible('solution')->toArray();

        $diff = array_diff($answers, $arrayFront);

        return $diff;
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
        $answer = new TrainingAnswer();

        $answer->name = $request->json('name');
        $answer->solution = $request->json('solution');
        $answer->question_id = $request->json('question_id');

        $answer->save();

        return $answer;
    }

    /**
     * Update Answer
     *
     * @param TrainingAnswerUpdateRequest $request
     * @param $id
     * @return mixed
     */
    public function update(TrainingAnswerUpdateRequest $request, $id)
    {
        $answer = TrainingAnswer::findOrfail($id);

        $answer->name = $request->json('name');
        $answer->solution = $request->json('solution');
        $answer->question_id = $request->json('question_id');

        $answer->update();

        return $answer;

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
}
