<?php

namespace App\Services\Impl;


use App\Entities\HomepageMessages;
use App\Services\HomepageMessagesService;

class HomepageMessagesServiceImpl implements HomepageMessagesService
{

    /**
     * Find All
     *
     * @return HomepageMessages|\Illuminate\Http\JsonResponse|mixed
     */
    public function findAll()
    {
        return HomepageMessages::get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return HomepageMessages::findOrFail($id);
    }

    /**
     * Save new
     *
     * @param HomepageMessages $messages
     * @return HomepageMessages|\Illuminate\Http\JsonResponse|mixed
     */
    public function save(HomepageMessages $messages)
    {
        $messages->save();

        return $messages;
    }

    /**
     * Update by id
     *
     * @param HomepageMessages $messages
     * @return HomepageMessages|\Illuminate\Http\JsonResponse|mixed
     */
    public function update(HomepageMessages $messages)
    {
        $messages->update();

        return $messages;
    }

    /**
     * Delete
     *
     * @param $id
     * @return HomepageMessages|\Illuminate\Http\JsonResponse|mixed
     */
    public function delete($id)
    {
        $messages = HomepageMessages::findOrFail($id);

        $messages->delete();
    }
}