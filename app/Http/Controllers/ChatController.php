<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Service $service)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * 1. Check if attachFile isn't empty.
         * 2. If not empty save file.
         * 3.  
         */

        $path = Storage::putFile('files', $request->file('attachFile'));

        $chat = Chat::create([
            'service_id' => $request->serviceId,
            'owner' => $request->owner,
            'guest' => $request->guest,
            'message' => $request->message,
            'speaker' => $request->speaker,
            'attachFile' => $path,
        ]);
        
        // service id, owner, guest, message   
        $chat->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service, User $guest)
    {
        // Get the service's owner
        $owner = $service->user;        
        
        // Recover all chat messages for this conversation

        /** 
         * NOTE: the chat messages are recovered in order inverse to see last
         * message on page 1 and first message on last page. But it's necessary
         * reverse messages again on the view (see reverse on chat view) to
         * sort them right.
         */
        $chat = Chat::where('service_id', $service->id)
            ->where('owner', $owner->id)
            ->where('guest', $guest->id)
            ->latest()->paginate(15);
        
        return view('profile.chat', 
            compact('service', 'chat', 'owner', 'guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
