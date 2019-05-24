<?php

namespace App\Http\Controllers;

use App\Entities\Video;
use App\Http\Requests\VideoSaveRequest;
use App\Http\Requests\VideoUpdateRequest;

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
     * @param VideoSaveRequest $request
     * @return Video
     */

    public function store(VideoSaveRequest $request){

        $video = new Video();

        $video->title = $request->get('title');
        $video->description = $request->get('description');
        $video->path = $request->get('path');

        $video->save();

        return $video;
    }

    /**
     * Update Video
     *
     * @param VideoUpdateRequest $request
     * @param $id
     * @return mixed
     */

    public function update(VideoUpdateRequest $request, $id){
        $video = Video::find($id);

        $video->title = $request->get('title');
        $video->description = $request->get('description');
        $video->path = $request->get('path');

        $video->update();

        return $video;
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
