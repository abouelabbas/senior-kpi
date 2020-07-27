<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Students;
use App\Admins;
use App\Trainers;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    //
    //Get login page
    //
    public function Login()
    {
        return View('Login');
    }
    //
    //Proceed login
    //
    public function LoginProceed(Request $request)
    {
        $email = $request->Email;
        $pass = $request->Password;
        $admin = Admins::where([
            ['Email','=',$email],
            ['Password','=',$pass]
        ])->get();
        $adminCount = $admin->count();
        $trainer = Trainers::where([
            ['Email','=',$email],
            ['Password','=',$pass]
        ])->get();
        $trainerCount = $trainer->count();
        $student = Students::where([
            ['Email','=',$email],
            ['Password','=',$pass]
        ])->get();
        $studentCount = $student->count();
        if($adminCount > 0){
            $request->session()->put('Id',$admin[0]->AdminId);
            $request->session()->put('Email',$admin[0]->Email);
            $request->session()->put('Birthdate',$admin[0]->Birthdate);
            $request->session()->put('Phone',$admin[0]->Phone);
            $request->session()->put('NameAr',$admin[0]->AdminNameAr);
            $request->session()->put('NameEn',$admin[0]->AdminNameEn);
            $request->session()->put('Company',$admin[0]->Company);
            $request->session()->put('Job',$admin[0]->Job);
            $request->session()->put('ImagePath',$admin[0]->ImagePath);
            $request->session()->put('JoinDate',$admin[0]->JoinDate);
            $request->session()->put('role','admin');

            return Redirect::to('/Admin');
        }elseif($trainerCount > 0){
            $request->session()->put('Id',$trainer[0]->TrainerId);
            $request->session()->put('Email',$trainer[0]->Email);
            $request->session()->put('Birthdate',$trainer[0]->Birthdate);
            $request->session()->put('Phone',$trainer[0]->Phone);
            $request->session()->put('NameAr',$trainer[0]->FullnameAr);
            $request->session()->put('NameEn',$trainer[0]->FullnameEn);
            $request->session()->put('Company',$trainer[0]->Company);
            $request->session()->put('Job',$trainer[0]->Job);
            $request->session()->put('ImagePath',$trainer[0]->ImagePath);
            $request->session()->put('JoinDate',$trainer[0]->JoinDate);
            $request->session()->put('role','trainer');
            $request->session()->put('token',$trainer[0]->_token);
            $request->session()->put('ExternalCourses',$trainer[0]->ExternalCourses);

            return Redirect::to('/Trainer');
        }elseif($studentCount > 0){
            $request->session()->put('Id',$student[0]->StudentId);
            $request->session()->put('Email',$student[0]->Email);
            $request->session()->put('Birthdate',$student[0]->Birthdate);
            $request->session()->put('Phone',$student[0]->Phone);
            $request->session()->put('NameAr',$student[0]->FullnameAr);
            $request->session()->put('NameEn',$student[0]->FullnameEn);
            $request->session()->put('Company',$student[0]->Company);
            $request->session()->put('Job',$student[0]->Job);
            $request->session()->put('ImagePath',$student[0]->ImagePath);
            $request->session()->put('JoinDate',$student[0]->JoinDate);
            $request->session()->put('role','student');
            $request->session()->put('ExternalCourses',$student[0]->ExternalCourses);

            return Redirect::to('/Student');
        }else{
            return Redirect::to('/Login');
        }
        return $request->Email . " " . $request->Password;
    }

    //
    // Logout
    //
    public function logout()
    {
        Session::flush();

        return Redirect::to('/Login');
    }

    //
    //
    //
    protected function guard()
    {
        return Auth::guard('trainer');
    }
}
