<?php

namespace App\Services\Impl;


use App\Entities\Literature;
use App\Filters\ApiRequest;
use App\Filters\FilterConstants;
use App\Services\LiteratureService;

class LiteratureServiceImpl implements LiteratureService
{
    private $allowFilters = [
        'partial' =>FilterConstants::LITERATURE_PARTIAL,
        'exact' =>FilterConstants::LITERATURE_EXACT,
    ];
    private $allowIncludes = FilterConstants::LITERATURE_INCLUDES;
    /**
     * Find All
     *
     * @return Literature|\Illuminate\Http\JsonResponse|mixed
     */
    public function findAll()
    {
        return ApiRequest::applyQuery($this->allowFilters,$this->allowIncludes,Literature::class)->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return ApiRequest::applyQuery([],$this->allowIncludes,Literature::class)
            ->where('id',$id)
            ->firstOrFail();
    }

    /**
     * Save new
     *
     * @param Literature $literature
     * @return Literature|\Illuminate\Http\JsonResponse|mixed
     */
    public function save(Literature $literature)
    {
        $literature->save();

        return $literature;
    }

    /**
     * Update by id
     *
     * @param Literature $literature
     * @return Literature|\Illuminate\Http\JsonResponse|mixed
     */
    public function update(Literature $literature)
    {
        $literature->update();

        return $literature;
    }

    /**
     * Delete
     *
     * @param $id
     * @return Literature|\Illuminate\Http\JsonResponse|mixed
     */
    public function delete($id)
    {
        $literature = Literature::findOrfail($id);

        $literature->delete();
    }
}