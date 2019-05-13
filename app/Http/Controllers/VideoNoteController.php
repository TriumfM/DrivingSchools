<?php

namespace App\Http\Controllers;

use App\Entities\VideoNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoNoteController extends Controller
{
    /**
     * Find All
     *
     * @return mixed
     */

    public function index()
    {
        $notes = VideoNote::get();

        return $notes;
    }

    /**
     * Find by Id
     *
     * @param $noteId
     * @return mixed
     */
    public function show($noteId)
    {
        $note = VideoNote::findOrfail($noteId);

        return $note;
    }

    /**
     * Store VideoNote
     *
     * @param Request $request
     * @return VideoNote
     */
    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'hour' => 'required',
            'language' => 'required',
            'note' => 'required'
        ]);

        if ($validator->passes()) {

            $note = new VideoNote();

            $note->hour = $request->get('hour');
            $note->language = $request->get('language');
            $note->note = $request->get('note');

            $note->save();

            return $note;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Update VideoNote
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'hour' => 'required',
            'language' => 'required',
            'note' => 'required'
        ]);

        if ($validator->passes()){

            $note = VideoNote::find($id);

            $note->hour = $request->get('hour');
            $note->language = $request->get('language');
            $note->note = $request->get('note');

            $note->update();

            return $note;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Delete VideoNote
     *
     * @param $id
     */
    public function destroy($id)
    {
        $note = VideoNote::findOrfail($id);

        $note->delete();
    }
}
