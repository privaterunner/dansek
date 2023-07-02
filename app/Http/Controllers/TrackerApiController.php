<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TrackerApiController extends Controller
{
    public function request(Request $request) {
        
        $user = User::where('user_unique_id', get_cookie('user_unique_id'))->get()[0];

        return response()->json($user->status);

    }
}
