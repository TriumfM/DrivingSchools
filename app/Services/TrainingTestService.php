<?php


namespace App\Services;


use App\Entities\TrainingTest;

interface TrainingTestService
{
    /**
     * Find All
     *
     * @return TrainingTest|\Illuminate\Http\JsonResponse|mixed
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
     * @param TrainingTest $trainingTest
     * @return TrainingTest|\Illuminate\Http\JsonResponse|mixed
     */
    public function save(TrainingTest $trainingTest);


    /**
     * Update by id
     *
     * @param TrainingTest $trainingTest
     * @return TrainingTest|\Illuminate\Http\JsonResponse|mixed
     */
    public function update(TrainingTest $trainingTest);

    /**
     * Delete
     *
     * @param $id
     * @return TrainingTest|\Illuminate\Http\JsonResponse|mixed
     */
    public function delete($id);
}