<?php

namespace App\Services\Impl;


use App\Brand;
use App\Filters\ApiRequest;
use App\Filters\FilterConstants;
use App\Services\UserService;
use App\User;

class UserServiceImpl implements UserService
{
    private $allowFilters = [
        'partial' =>FilterConstants::USER_PARTIAL,
        'exact' =>FilterConstants::USER_EXACT,
    ];
    private $allowIncludes = FilterConstants::USER_INCLUDES;
    /**
     * Find All
     *
     * @return User|\Illuminate\Http\JsonResponse|mixed
     */
    public function findAll()
    {
        return ApiRequest::applyQuery($this->allowFilters,$this->allowIncludes,User::class)->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return ApiRequest::applyQuery([],$this->allowIncludes,User::class)
            ->where('id',$id)
            ->first();
    }

    /**
     * Save new
     *
     * @param User $user
     * @return User|\Illuminate\Http\JsonResponse|mixed
     */
    public function save(User $user)
    {
        $user->save();
        return $user;
    }

    /**
     * Update by id
     *
     * @param User $user
     * @return User|\Illuminate\Http\JsonResponse|mixed
     */
    public function update(User $user)
    {
        $user->update();

        return $user;
    }

    /**
     * Delete
     *
     * @param $id
     * @return User|\Illuminate\Http\JsonResponse|mixed
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
    }
}