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
         * 1. Auth->Owner: no button (there're no chats) or chats list buttons
         * 2. Auth->Guest: chat with Owner button
         */ 

        // If logged user is the service's owner 
        if (Auth::user() == $service->user) {

            // Get ids of guests talking on this service 
            $guestsIds = Chat::where('owner', $service->user->id)
                ->get()->unique('guest')->pluck('guest');

            // Get respective users from their guests ids
            $guests = [];

            foreach ($guestsIds as $guestId) {
                array_push($guests, User::find($guestId)->name);
            }
        } else {
            // I'm a guest in the service
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
