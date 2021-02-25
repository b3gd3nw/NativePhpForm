<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Models\User;

class UsersController extends Controller
{


    public function submit(UsersRequest $req)
    {
        $user = new User();
        $user->firstname = $req->input('firstname');
        $user->lastname = $req->input('lastname');
        $user->birthdate = $req->input('birthdate');
        $user->reportsubject = $req->input('reportsubject');
        $user->country = $req->input('country');
        $user->phone = $req->input('phone');
        $user->email = $req->input('email');

        $user->save();

        setcookie('userid', $user->id, 0,'/');

        return http_response_code(200);
    }


    public function update(ProfileRequest $req)
    {

        $profile = new Profile();
        $profile->company = $req->input('company');
        $profile->position = $req->input('postion');
        $profile->aboutme = $req->input('aboutme');
        $profile->photo = $req->input('photo');
        $profile->userid = $_COOKIE['userid'];

        return $profile->userid;

    }

}
