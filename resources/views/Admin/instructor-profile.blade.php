@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])

@section('content')

@if (session('edited'))

<div class="alert alert-info">

    {{ session('edited') }}

</div>

@endif

                <div class="ms-profile-overview">

                    <div class="ms-profile-cover">

                      @if (!$Trainer->ImagePath)

                          <img class="ms-profile-img" src="https://via.placeholder.com/270x270" alt="people">

                          @else

                          <img class="ms-profile-img" src="{{ asset("http://kpi.seniorsteps.net/storage/app/public/$Trainer->ImagePath") }}" alt="people">

                      @endif

                        

                        <div class="ms-profile-user-info">

                            <h1 class="ms-profile-username">{{$Trainer->FullnameEn}}</h1>

                            <h2 class="ms-profile-role">{{$Trainer->Job}}</h2>

                        </div>

    

                    </div>

                    <div class="ms-profile-navigation nav nav-tabs tabs-bordered w-100 d-flex justify-content-end">

                        

                        <a href="/Admin/Trainers/EditProfile/{{$Trainer->TrainerId}}" class="btn btn-primary m-2 has-icon"> <i class="flaticon-pencil"

                                aria-hidden="true"></i> Edit</a>

                    </div>

                </div>

    

                <div class="row">

    

    

                    <div class="col-xl-5 col-md-12">

                        <div class="ms-panel ms-panel-fh">

                            <div class="ms-panel-body">

    

                                <h2 class="section-title">Basic Information</h2>

                                <table class="table ms-profile-information">

                                    <tbody>

                                        <tr>

                                            <th scope="row">Full Name</th>

                                            <td>{{$Trainer->FullnameEn}}</td>

                                        </tr>

    

                                        <tr>

                                            <th scope="row">Email Address</th>

                                            <td>{{$Trainer->Email}}</td>

                                        </tr>

                                        <tr>

                                            <th scope="row">Birthday</th>

                                            <td>{{$Trainer->Birthdate}}</td>

                                        </tr>

    

                                        <tr>

                                            <th scope="row">Phone Number</th>

                                            <td>{{$Trainer->Phone}}

                                                @if ($Trainer->SecondPhone)

                                                , {{$Trainer->SecondPhone}}

                                                @endif

                                            </td>

                                        </tr>

                                        <tr>

                                            <th scope="row">First time of join</th>

                                            <td>{{$Trainer->JoinDate}}</td>

                                        </tr>

    

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

    

                    <div class="col-xl-7 col-md-12">

                        <div class="ms-panel ms-panel-fh">

                            <div class="ms-panel-body">

    

                                <h2 class="section-title">Basic Information</h2>

                                <div class="table-scrollable">

                                    <table class="table ms-profile-information text-left">

                                        <tbody>

                                            {{-- <tr>

                                                <th scope="row">Internal Courses</th>

                                                <td><a href="Course.html"> <i class="fa fa-link" aria-hidden="true"></i>

                                                        MeanStack</a></td>

                                                <td><a href="Course.html"><i class="fa fa-link" aria-hidden="true"></i>

                                                        FullStack</a></td>

                                                <td><a href="Course.html"> <i class="fa fa-link" aria-hidden="true"></i>

                                                        Security</a></td>

    

                                            </tr>

                                            <tr>

                                                <th scope="row">External Courses</th>

                                                <td>English</td>

                                                <td>Britsh</td>

                                                <td>Marketing</td>

                                            </tr> --}}

    

                                            <tr>

                                                <th scope="row">Job</th>

                                                <td>{{$Trainer->Job}}</td>

                                            </tr>

                                            <tr>

                                                <th scope="row">Company</th>

                                                <td>{{$Trainer->Company}}</td>

                                            </tr>

                                            <tr>

                                                <th scope="row">Social Links</th>

                                                <td>

                                                    @if ($Trainer->Facebook)

                                                    <a href="{{$Trainer->Facebook}}" target="_blank" class="ms-btn-icon btn-pill btn-secondary"> <i class="fab fa-facebook-f    "></i> </a>

                                                      @endif

                                                      @if ($Trainer->Youtube)

                                                          <a href="{{$Trainer->Youtube}}" target="_blank" class="ms-btn-icon btn-pill btn-danger"> <i class="fab fa-youtube    "></i> </a>

                                                      @endif

                                                      @if ($Trainer->Linkedin)

                                                          <a href="{{$Trainer->Linkedin}}" target="_blank" class="ms-btn-icon btn-pill btn-info"> <i class="fab fa-linkedin    "></i> </a>

                                                      @endif

                                                </td>

                                            </tr>

    

                                           

    

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

    

    

    

                </div>

                <div class="row">

                    <div class="col-md-12">

                        <div class="ms-panel ms-panel-fh">

                            <div class="ms-panel-body">

    

                                <h2 class="section-title">Rounds</h2>

                                <div class="table-responsive">

                                    <table  class="dattable smal-tb table table-striped thead-dark  w-100">

                                        <thead>

                                            <th>#</th>

                                          <th>Round </th>

                                          

                                          

                                          <th> </th>

                                        </thead>

                                        <tbody>

                                            <?php $i = 1;?>

                                        @foreach ($Rounds as $Round)

                                            <tr>

                                            <td>{{$i}}</td>

                                            <td>

                                            

                      

                                               {{$Round->CourseNameEn}} GR {{$Round->GroupNo}}

                                            

                                            </td>

                                            

                                            <td>

                                            <a href="/Admin/Evaluations/{{$Round->RoundId}}" class="btn btn-dark" >

                                                    Evaluation

                                                </a>

                                                <a href="/Admin/Course/{{$Round->RoundId}}/Attendance" class="btn btn-warning" >

                                                    Attendence

                                                </a>

            

                                             

                                            </td>

                                           

                                            

                                           

                                          </tr>

                                          <?php $i++; ?>

                                        @endforeach

                                          

                                        

                                          

                                         

                                        

                                         

                                        </tbody>

                                      </table>  

                                   

                                  

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

           

@endsection