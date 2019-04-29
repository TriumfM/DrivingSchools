<?php

namespace App\Http\Controllers;

use App\Entities\TrainingAnswer;
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
     * @param Request $request
     * @return Answer
     */
    public function store($questionId, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'solution' => 'in:Po,Jo|required',
        
        ]);
        if($validator->passes()){

            $answer = new TrainingAnswer();

            $answer->name = $request->json('name');
            $answer->solution = $request->json('solution');
            $answer->question_id = $questionId;

            $answer->save();

            return $answer;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Update Answer
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'solution' => 'in:Po,Jo|required'
        ]);

        if($validator->passes()){

            $answer = TrainingAnswer::findOrfail($id);

            $answer->name = $request->get('name');
            $answer->solution = $request->get('solution');

            $answer->update();

            return $answer;
        }

        return response()->json(["errors" => $validator->messages()], 422);
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
