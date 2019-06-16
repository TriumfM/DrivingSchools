<?php

namespace App\Services;

use App\Entities\TrainingQuestion;

interface TrainingQuestionService
{
    /**
     * Find All
     *
     * @return TrainingQuestion|\Illuminate\Http\JsonResponse|mixed
     */
    public function findAll();

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * Save new
     *
     * @param TrainingQuestion $question
     * @return TrainingQuestion|\Illuminate\Http\JsonResponse|mixed
     */
    public function save(TrainingQuestion $question);


    /**
     * Update by id
     *
     * @param TrainingQuestion $question
     * @return TrainingQuestion|\Illuminate\Http\JsonResponse|mixed
     */
    public function update(TrainingQuestion $question);

    /**
     * Delete
     *
     * @param $id
     * @return TrainingQuestion|\Illuminate\Http\JsonResponse|mixed
     */
    public function delete($id);
}