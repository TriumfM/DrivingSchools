<?php

namespace App\Http\Controllers;

use App\Entities\TrainingQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Entities\TrainingAnswer;
use Illuminate\Support\Facades\Input;
use App\Entities\Image;

class TrainingQuestionController extends Controller
{
    /**
     * Find All
     *
     * @return mixed
     */
    public function index()
    {
        $questions = TrainingQuestion::with( 'answers')->get();

        return $questions;
    }

    /**
     * Find by Id
     *
     * @param $questionId
     * @return mixed
     */
    public function show($questionId) {
        $question = TrainingQuestion::with( 'answers')->findOrfail($questionId)->makeVisible([
            'answer.solution'
        ]);

        return $question;
    }

    /**
     * Store Question
     *
     * @param Request $request
     * @return TrainingQuestion
     */
    public function store($testId, Request $request)
    {

        $validator = Validator::make($request->input('question'), [
            'name' => 'required',
            'points' => 'required'
        ]);
        if($validator->passes()) {

            $question = new TrainingQuestion();

            $question->name = $request->input('question')['name'];
            $question->points = $request->input('question')['points'];
            $question->test_id = $testId;


           $destinationPath = public_path() . '/fonix/images/questions/';

           $imageName = str_random() . '.' .
               $request->file('file')->getClientOriginalExtension();

           $request->file('file')->move($destinationPath, $imageName);

           $question->photo = $imageName;

            $question->save();

            foreach ($request->input('answers')as $answer){
                $ans = new TrainingAnswer();

                $ans->name = $answer['name'];
                $ans->solution = $answer['solution'];
                $ans->question_id = $question->id;

                $ans->save();
            }


            return $question;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Update Question
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id, $photoUpdate)
    {

        $question = TrainingQuestion::findOrfail($id);

        $validator = Validator::make($request->input('question'),[
            'name' => 'required',
            'points' => 'required',
            'photo' => 'required',
            'test_id' => 'required'
        ]);

        if($validator->passes()){

            $question->name = $request->input('question')['name'];
            $question->points = $request->input('question')['points'];
            $question->photo = $request->input('question')['photo'];
            $question->test_id = $request->input('question')['test_id'];

            if ($photoUpdate == "true"){

                $destinationPath = public_path() . '/fonix/images/questions/';

                $imageName = str_random() . '.' .
                    $request->file('file')->getClientOriginalExtension();

                $request->file('file')->move($destinationPath, $imageName);

                $question->photo = $imageName;
            }

            $question->update();

            return $question;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }


    /**
     * Delete Question
     *
     * @param $id
     */
    public function destroy($id) {
        $question = TrainingQuestion::findOrfail($id);

        $question->delete();
    }


}
