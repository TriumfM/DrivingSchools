<?php

namespace App\Services;


use App\Entities\HomepageMessages;

interface HomepageMessagesService
{
    /**
     * Find All
     *
     * @return HomepageMessages|\Illuminate\Http\JsonResponse|mixed
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
     * @param HomepageMessages $messages
     * @return HomepageMessages|\Illuminate\Http\JsonResponse|mixed
     */
    public function save(HomepageMessages $messages);


    /**
     * Update by id
     *
     * @param HomepageMessages $messages
     * @return HomepageMessages|\Illuminate\Http\JsonResponse|mixed
     */
    public function update(HomepageMessages $messages);

    /**
     * Delete
     *
     * @param $id
     * @return HomepageMessages|\Illuminate\Http\JsonResponse|mixed
     */
    public function delete($id);
}