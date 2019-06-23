<?php

namespace App\Http\Controllers;

use App\Entities\TrainingQuestion;
use App\Http\Requests\TrainingQuestionSaveRequest;
use App\Http\Requests\TrainingQuestionUpdateRequest;
use App\Services\TrainingQuestionService;
use Illuminate\Support\Facades\Storage;
use App\Entities\TrainingAnswer;

class TrainingQuestionController extends Controller
{
    private $service;

    public function __construct(TrainingQuestionService $service)
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
     * Store Question
     *
     * @param TrainingQuestionSaveRequest $request
     * @return TrainingQuestion
     */
    public function store(TrainingQuestionSaveRequest $request)
    {

        $question = new TrainingQuestion();

        $question->name = $request['name'];
        $question->points = $request['points'];
        $question->test_id = $request['test_id'];
        $question->order_number = $request['order_number'];

        if($request->hasFile('photo')){
            $question->photo_url = Storage::url( Storage::put('public/images/questions', $request->file('photo')) );
        }
        $question = $this->service->save($question);

        for($i = 0; $i < 3; $i++)
        {
            $answer = new TrainingAnswer();
            $answer->name = '';
            $answer->question_id =  $question->id;
            $answer->solution = false;
            $answer->save();
        }

        return $question;
    }

    /**
     * Update Question
     *
     * @param TrainingQuestionUpdateRequest $request
     * @param $id
     * @return mixed
     */
    public function update(TrainingQuestionUpdateRequest $request, $id)
    {
        $question = TrainingQuestion::findOrfail($id);

        $question->name = $request['name'];
        $question->points = $request['points'];
        $question->test_id = $request['test_id'];
        $question->order_number = $request['order_number'];

        if($request->hasFile('photo')){
            $question->photo_url = Storage::url( Storage::put('public/images/questions', $request->file('photo')) );
        }

        return $this->service->update($question);
    }


    /**
     * Delete Question
     *
     * @param $id
     */
    public function destroy($id)
    {
     $this->service->delete($id);
    }


    public function showByTestId($test_id)
    {
        return TrainingQuestion::where('test_id', $test_id)->get();
    }

}
