<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\ValidationRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ValidationRequest
     * @return \Illuminate\Http\Response
     */
    public function store(ValidationRequest $request)
    {
        $user = User::create([
            'name' => Str::title($request->name), 
            'alias' => Str::title($request->alias), 
            'avatar' => $this->makeAvatarURI($request->file('avatar'), Str::title($request->name)), 
        ]);

        return redirect()->route('users.show', ['user' => $user])
            ->with('uploadStatus', 'File uploaded successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ValidationRequest
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ValidationRequest $request, User $user)
    {
        // Validations made in 'ValidationRequest' form

        Storage::delete($user->avatar);

        $user->update([
            'name' => Str::title($request->name),
            'alias' => Str::title($request->alias), 
            'avatar' => $this->makeAvatarURI($request->file('avatar'), Str::title($request->name)), 
        ]);

        $user->save();

        return redirect()->route('users.show', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Storage::delete($user->avatar);
        
        $user->delete();

        return redirect()->route('users.index');
    }

    /**
     * Auxiliar function to create avatar file name with its extension
     * 
     * @param $avatarFile is the avatar file name WITHOUT extension
     * @param $username the name with which will be saved the file
     * @return $avatarPath file path complete (see database)
     */
    public function makeAvatarURI($avatarFile, $username) 
    {
        $avatar = $avatarFile;

        $avatarExtension = '.' . $avatar->extension();

        $avatarPath = $avatar->storeAs('public/avatars', Str::snake($username) . $avatarExtension);

        return $avatarPath;
    }
}
