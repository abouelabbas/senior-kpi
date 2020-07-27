@extends('Layouts.adminkpi')
@section('content')
<div class="ms-profile-overview">
    <div class="ms-profile-cover">
      @if ($Admin->ImagePath !== null)
          <img class="{{$Admin->ImagePath}}" src="https://via.placeholder.com/270x270" alt="people">
      @else
          <img class="ms-profile-img" src="https://via.placeholder.com/270x270" alt="people">
      @endif
        
        <div class="ms-profile-user-info">
        <h1 class="ms-profile-username">{{session('NameEn')}}</h1>
            <h2 class="ms-profile-role">{{session('Job')}}</h2>
        </div>

    </div>
    <div class="ms-profile-navigation nav nav-tabs tabs-bordered w-100 d-flex justify-content-end">

    <a href="/Admin/Profile/Edit/{{$Admin->AdminId}}" class="btn btn-primary m-2 has-icon"> <i class="flaticon-pencil"
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
                            <td>{{$Admin->FullnameEn}}</td>
                        </tr>

                        <tr>
                            <th scope="row">Email Address</th>
                            <td>{{$Admin->Email}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Birthday</th>
                            <td>{{$Admin->Birthdate}}</td>
                        </tr>

                        <tr>
                            <th scope="row">Phone Number</th>
                            <td>{{$Admin->Phone}}</td>
                        </tr>
                        <tr>
                            <th scope="row">First time of join</th>
                            <td>{{$Admin->JoinDate}}</td>
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
                                <td>{{$Admin->Job}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Company</th>
                                <td>{{$Admin->Company}}</td>
                            </tr>

                           

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>

@endsection