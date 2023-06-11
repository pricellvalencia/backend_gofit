<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Member;
use App\Models\User;
use Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->EMAIL;
        $password = $request->PASSWORD;

        $user = Pegawai::where('EMAIL', $email)-> where('PASSWORD',$password)->first();
        if($user!=null){
            $response['message'] = "Login Success";
            $response['data'] = $user;
            $response['status'] = true;
            return response($response);
        }
        else{
            $response['message'] = "Login Failed";
            $response['data'] = null;
            $response['status'] = false;
            return response($response, 401);
        }
    }

    public function loginMember(Request $request)
    {
        $id_member = $request->ID_MEMBER;
        $password = $request->PASSWORD_MEMBER;

        $user = Member::where('ID_MEMBER', $id_member)-> where('PASSWORD_MEMBER',$password)->first();
        if($user!=null){
            $response['message'] = "Login Success";
            $response['data'] = $user;
            $response['status'] = true;
            return response($response);
        }
        else{
            $response['message'] = "Login Failed";
            $response['data'] = null;
            $response['status'] = false;
            return response($response, 401);
        }
    }

    public function updatePassword(Request $request)
    {
        $email = $request->EMAIL;
        $password = $request->PASSWORD;
        $password_new = $request->PASSWORD_NEW;
        $user = Pegawai::where('EMAIL', $email)->where('PASSWORD', $password)->first();
        if(!$user){
            return response()->json(['message' => 'Incorrect Username or Password'], 400);
        }
        if($password == $password_new){
            return response()->json(['message' => 'The password cannot be the same as the old password'], 400);
        }

        if($user!=null){
            $user->PASSWORD = $password;
            Pegawai::where('EMAIL', $email)->update(['PASSWORD' => $password_new]);
            $hasil = Pegawai::where('EMAIL', $email)->first();
            $response['message'] = "Update Password Success";
            $response['data'] = $hasil;
            $response['status'] = true;
            return response($response);
        }
        else{
            $response['message'] = "Update Password Failed";
            $response['data'] = null;
            $response['status'] = false;
            return response($response);
        }
    }
  
    public function loginMobile(Request $request)
    {
        $username = $request->id_user;
        $password = $request->password;

        //find all data pegawai with id_user same as email
        $pegawai = Pegawai::where('email', $username)->first();


        $user = User::where('id_user', $username)-> where('password',$password)->first();
        if($user!=null){
            $response['message'] = "Login Berhasil";
            $response['data'] = $user;
            $response['pegawai'] = $pegawai;
            $response['status'] = true;
            return response($response);
        }
        else{
            $response['message'] = "Login Gagal";
            $response['data'] = null;
            $response['status'] = false;
            return response($response, 400);
        }
    }
}
