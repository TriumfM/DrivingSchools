<?php

namespace App\Services\Impl;


use App\Entities\TrainingQuestion;
use App\Filters\ApiRequest;
use App\Filters\FilterConstants;
use App\Services\TrainingQuestionService;

class TrainingQuestionServiceImpl implements TrainingQuestionService
{
    private $allowFilters = [
        'partial' =>FilterConstants::TRAINING_QUESTION_PARTIAL,
        'exact' =>FilterConstants::TRAINING_QUESTION_EXACT,
    ];
    private $allowIncludes = FilterConstants::TRAINING_QUESTION_INCLUDES;
    /**
     * Find All
     *
     * @return TrainingQuestion|\Illuminate\Http\JsonResponse|mixed
     */
    public function findAll()
    {
        return ApiRequest::applyQuery($this->allowFilters,$this->allowIncludes,TrainingQuestion::class)->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return ApiRequest::applyQuery([],$this->allowIncludes,TrainingQuestion::class)
            ->where('id',$id)
            ->firstOrFail();
    }

    /**
     * Save new
     *
     * @param TrainingQuestion $question
     * @return TrainingQuestion|\Illuminate\Http\JsonResponse|mixed
     */
    public function save(TrainingQuestion $question)
    {
        $question->save();

        return $question;
    }

    /**
     * Update by id
     *
     * @param TrainingQuestion $question
     * @return TrainingQuestion|\Illuminate\Http\JsonResponse|mixed
     */
    public function update(TrainingQuestion $question)
    {
        $question->update();

        return $question;
    }

    /**
     * Delete
     *
     * @param $id
     * @return TrainingQuestion|\Illuminate\Http\JsonResponse|mixed
     */
    public function delete($id)
    {
        $question = TrainingQuestion::findOrfail($id);

        $question->delete();
    }
}