<?php

namespace App\Http\Controllers;


use App\Entities\HomepageMessages;
use App\Http\Requests\HomepageMessageSaveRequest;
use App\Http\Requests\HomepageMessageUpdateRequest;
use App\Services\HomepageMessagesService;


class HomepageMessagesController extends Controller
{
    private $service;

    public function __construct(HomepageMessagesService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->service->findAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param HomepageMessageSaveRequest $request
     * @return HomepageMessages
     */
    public function store(HomepageMessageSaveRequest $request)
    {
        $messages = new HomepageMessages();

        $messages->name = $request['name'];
        $messages->email = $request['email'];
        $messages->message_text = $request['message_text'];

        return $this->service->save($messages);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->service->findById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param HomepageMessageUpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(HomepageMessageUpdateRequest $request, $id)
    {
        $messages = HomepageMessages::findOrFail($id);

        $messages->name = $request['name'];
        $messages->email = $request['email'];
        $messages->message_text = $request['message_text'];

        return $this->service->update($messages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
