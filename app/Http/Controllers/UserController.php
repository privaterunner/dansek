<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index() {

        $users = User::whereNot('status', 'complete')
                        ->orWhere('status', null)
                        ->latest()->get();

        return UserResource::collection($users);

    }

    public function show(User $user) {

        return new UserResource($user);

    }

    public function verified() {
        $users = User::where('status', 'complete')->latest()->get();

        return UserResource::collection($users);
    }

    public function complete(User $user) {

        $user = $user->update([
            'status' => 'complete',
            'user_unique_id' => '',
        ]);

        if($user) {
            destroy_cookie('user_unique_id');
            return response('status updated');
        }

    }

    public function update(Request $request, User $user) {

        $data = $user->update([
            'status' => $request->status
        ]);

        if($data) {
            return response('status updated');
        }

    }

    public function delete(User $user) {

        $user = $user->delete();

        if($user) {
            destroy_cookie('user_unique_id');
            return response('user deleted');
        }

    }
}
