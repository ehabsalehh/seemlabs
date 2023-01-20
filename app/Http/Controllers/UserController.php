<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Response;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::get());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $user = User::findOrFail($user);
        return UserResource::make($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $user)
    {
        $user = User::findOrFail($user);
        $data = $request->validated();
        $user->update($data);
//        $user->update([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'phone_number' => $data['phone_number'],
//            'password' => bcrypt($data['password']),
//            'birth_date' => $data['birth_date']
//        ]);
        return UserResource::make($user)->additional([
            'code' => Response::HTTP_OK,
            'success' => true,
            'message' => 'User Updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($user)
    {
        $user = User::findOrFail($user);
        $user->delete();
        return UserResource::make($user)->additional([
            'code' => Response::HTTP_OK,
            'success' => true,
            'message' => 'User Disabled successfully'
        ]);
    }

}
