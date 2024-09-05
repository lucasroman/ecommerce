<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\Chat;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all services of current user logged
        $servicesOfOwner = Service::where('user_id', Auth::user()->id)
            ->get();

        $servicesOfOthers = Service::where('user_id', '!=', Auth::user()->id)
            ->get();

        return view('profile.services-list', compact('servicesOfOwner', 'servicesOfOthers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        /**
         * If Authenticated user is:
         * 1. Owner: no button (there're no chats) or chats list buttons
         * 2. Guest: chat with Owner button
         */ 

        // Get all guest users here
        $guests = [];

        // If logged user is the service's owner 
        if (Auth::user() == $service->user) {
            // Get ids of guests talking on THIS SPECIFIC service 
            $guestsIds = Chat::where('owner', $service->user->id)
                ->where('service_id', $service->id)
                ->get()->unique('guest')->pluck('guest');
                
            $guests = $guestsIds->map(function (int $id) {
                return User::find($id);
            });
        } 

        return view('profile.service', compact(
            'service', 'guests'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
