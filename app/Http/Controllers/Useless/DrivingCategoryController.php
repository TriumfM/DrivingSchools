<?php

namespace App\Http\Controllers;

use App\Entities\DrivingCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DrivingCategoryController extends Controller
{
    /**
     * Find All @categories
     *
     * @return mixed
     */
    public function index($offset) {

        if ($offset == "null"){
            $categories = DrivingCategory::get();
            return $categories;
        }

        $categoriesCount = DrivingCategory::count();
        $categories = DrivingCategory::take($offset)->get();

        return array('count' => $categoriesCount, 'categories' => $categories);
    }

    /**
     * Find by Id
     *
     * @param $categoryId
     * @return mixed
     */
    public function show($categoryId)
    {
        $category = DrivingCategory::findOrfail($categoryId);

        return $category;
    }

    /**
     * Store DrivingCategory
     *
     * @param Request $request
     * @return DrivingCategory
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->passes()) {

            $category = new DrivingCategory();

            $category->name = $request->get('name');

            $category->save();

            return $category;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Update DrivingCategory
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->passes()) {

            $category = DrivingCategory::findOrfail($id);

            $category->name = $request->json('name');

            $category->update();

            return $category;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Delete DrivingCategory
     *
     * @param $id
     */
    public function destroy($id)
    {
        $category = DrivingCategory::findOrfail($id);

        $category->delete();
    }
}
