<?php

namespace App\Http\Controllers;

use App\Entities\Literature;
use App\Http\Requests\LiteratureSaveRequest;
use App\Http\Requests\LiteratureUpdateRequest;
use Illuminate\Support\Facades\Storage;

class LiteratureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Literature::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LiteratureSaveRequest $request
     * @return Literature
     */
    public function store(LiteratureSaveRequest $request)
    {
        $literature = new Literature();

        $literature->title = $request['title'];
        $literature->description = $request['description'];
        $literature->type = $request['type'];

        if($request->hasFile('photo'))
            $literature->photo_url = Storage::url( Storage::put('public/images/literature', $request->file('photo')) );

        $literature->save();

        return $literature;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Literature::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LiteratureUpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(LiteratureUpdateRequest $request, $id)
    {
        $literature = Literature::findOrFail($id);

        $literature->title = $request['title'];
        $literature->description = $request['description'];
        $literature->type = $request['type'];

        if($request->hasFile('photo'))
            $literature->photo_url =  Storage::url( Storage::put('public/images/literature', $request->file('photo')) );

        $literature->update();

        return $literature;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $literature = Literature::findOrFail($id);

        $literature->delete();
    }
}
