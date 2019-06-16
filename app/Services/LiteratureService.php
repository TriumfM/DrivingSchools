<?php

namespace App\Services;


use App\Entities\Literature;

interface LiteratureService
{
    /**
     * Find All
     *
     * @return Literature|\Illuminate\Http\JsonResponse|mixed
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
     * @param Literature $literature
     * @return Literature|\Illuminate\Http\JsonResponse|mixed
     */
    public function save(Literature $literature);


    /**
     * Update by id
     *
     * @param Literature $literature
     * @return Literature|\Illuminate\Http\JsonResponse|mixed
     */
    public function update(Literature $literature);

    /**
     * Delete
     *
     * @param $id
     * @return Literature|\Illuminate\Http\JsonResponse|mixed
     */
    public function delete($id);
}