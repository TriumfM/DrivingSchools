<?php

namespace App\Services\Impl;


use App\Entities\TrainingTest;
use App\Filters\ApiRequest;
use App\Filters\FilterConstants;
use App\Services\TrainingTestService;

class TrainingTestServiceImpl implements TrainingTestService
{
    private $allowFilters = [
        'partial' =>FilterConstants::TRAINING_TEST_PARTIAL,
        'exact' =>FilterConstants::TRAINING_TEST_EXACT,
    ];
    private $allowIncludes = FilterConstants::TRAINING_TEST_INCLUDES;
    /**
     * Find All
     *
     * @return TrainingTest|\Illuminate\Http\JsonResponse|mixed
     */
    public function findAll()
    {
        return ApiRequest::applyQuery($this->allowFilters,$this->allowIncludes,TrainingTest::class)->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return ApiRequest::applyQuery([],$this->allowIncludes,TrainingTest::class)
            ->where('id',$id)
            ->firstOrFail();
    }

    /**
     * Save new
     *
     * @param TrainingTest $trainingTest
     * @return TrainingTest|\Illuminate\Http\JsonResponse|mixed
     */
    public function save(TrainingTest $trainingTest)
    {
        $trainingTest->save();

        return $trainingTest;
    }

    /**
     * Update by id
     *
     * @param TrainingTest $trainingTest
     * @return TrainingTest|\Illuminate\Http\JsonResponse|mixed
     */
    public function update(TrainingTest $trainingTest)
    {
        $trainingTest->update();
        return $trainingTest;
    }

    /**
     * Delete
     *
     * @param $id
     * @return TrainingTest|\Illuminate\Http\JsonResponse|mixed
     */
    public function delete($id)
    {
        $test = TrainingTest::findOrfail($id);

        $test->delete();
    }
}