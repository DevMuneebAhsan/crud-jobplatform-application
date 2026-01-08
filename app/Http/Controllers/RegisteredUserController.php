<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;

class RegisteredUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate user attributes
        $userAttributes = $request->validate([
            'name' => ['required', 'min:4'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', 'confirmed', 'min:8', 'max:24'],
        ]);
        //Validate employer attributes passed by user
        $employerAttributes = $request->validate([
            'employer' => ['required', 'min:8', 'max:20'],
            'logo' => ['required', File::types(['jpg', 'png', 'jpeg', 'webp'])],
        ]);

        //Create user in db and then for security make employer attribute through authenticated user
        $user = User::create($userAttributes);
        $logoPath = $request->logo->store('logos');
        $user->employer()->create([
            'name' => $employerAttributes['employer'],
            'logo' => $logoPath
        ]);
        Auth::login($user);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
