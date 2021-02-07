<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;

class Login2Controller extends Controller
{

    public function index(Request $request){

        $credentials = new UserModel(request()->get('user_name'),request()->get('password'));

        $serviceLogin = new SecurityService();


        $isValid = $serviceLogin->login($credentials);

        if($isValid){
            return view('loginPassed2')->with('model', $credentials);
        }else{
            return view('loginFailed')->with('model', $credentials);
        }


//        $formValues = $request->all();
//
//        $userName = request()->get('user_name');
//
//        //$userName = request()->input('user_name');
//
//        return request()->all();
    }

}
