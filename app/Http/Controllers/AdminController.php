<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    function getAdmin(Request $request){
        $AdminModel = new AdminModel;
        $data = $request->input('admin');
        $admin = $data['admin'];
        $password = $data['password'];
        $remember = $request->has('remember') ? true : false;
        $user = User::where(['admin'=>$admin,'password'=>$password], $remember)->first();
        if ($user){
            Auth::login($user);
            echo "success";
        }
        else{
            echo "please try again";
        }
    }
}