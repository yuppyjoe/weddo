<?php

namespace App\Http\Controllers;

use App\User;
use App\UserProfile;
use Illuminate\Http\Request;

class UserController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'string|required|unique:users,username,NULL,id,deleted_at,NULL',
            'email' => 'email|required|unique:users,email,NULL,id,deleted_at,NULL',
            'password' => 'string|required|min:8|max:26',
        ]);
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $data['user_type_id'] = 2;
        $data['active'] = 1;

        $user = User::firstOrCreate(
            $data
        );

        $profile = UserProfile::firstOrCreate(
            ['user_id' => $user->id]
        );

        return response()->json(
            [
                'user' => $user,
                'message' => 'User was created successfully'
            ], 201
        );

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *@throws \Illuminate\Validation\ValidationException
     */
    public function userCheck(Request $request) {
        $this->validate($request, [
            'field' => "string|required",
            'value' => "string|required"
        ]);

        return response()->json([
            'user' => User::where($request->input('field'), $request->input('value'))->first()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
