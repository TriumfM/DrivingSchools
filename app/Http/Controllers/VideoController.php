<?php

namespace App\Http\Controllers;

use App\Entities\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    /**
     * Find All
     *
     * @return mixed
     */

    public function index()
    {
        $videos = Video::get();

        return $videos;
    }

    /**
     * Find by Id
     *
     * @param $videoId
     * @return mixed
     */
    public function show($videoId)
    {
        $video = Video::findOrfail($videoId);

        return $video;
    }


    /**
     * Store Video
     *
     * @param Request $request
     * @return Video
     */

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
            'path' => 'required'
        ]);

        if ($validator->passes()) {

            $video = new Video();

            $video->title = $request->get('title');
            $video->description = $request->get('description');
            $video->path = $request->get('path');

//            $destinationPath = public_path() . '/fonix/videos/';
//
//            $videoeName = str_random() . '.' . $request->file('path')->getClientOriginalExtension();
//
//            $request->file('path')->move($destinationPath, $videoeName);
//
//            $video->path = $videoeName;

            $video->save();

            return $video;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Update Video
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(),[
           'title' => 'required',
            'description' => 'required',
            'path' => 'required'
        ]);

        if ($validator->passes()){

            $video = Video::find($id);

            $video->title = $request->get('title');
            $video->description = $request->get('description');
            $video->path = $request->get('path');

            $video->update();

            return $video;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Delete Video
     *
     * @param $id
     */
    public function destroy($id)
    {
        $video = Video::findOrfail($id);

        $video->delete();
    }
}
