@extends('Layouts/studentkpi',['StudentRounds'=>$StudentRounds])
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/Student"><i class="material-icons">home</i> Home</a></li>
      <li class="breadcrumb-item"><a href="/Student/Profile"> Profile</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
    </ol>
  </nav>

<div class="row">

<div class="col-12">
<div class="ms-panel ms-panel-fh">
  <form action="/Student/Profile/Edit" method="POST" class="needs-validation" novalidate>
<div class="ms-panel-body">
  <h2 class="section-title">Edit personal informations </h2>
 <hr>
 
  {{ csrf_field() }}
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="name"> Name</label>
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" ><i class="fas fa-user"></i></span>
            </div>
              <input type="text" name="FullnameEn" class="form-control" id="name" placeholder=" Name" value="{{$Student->FullnameEn}}">
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
         
          <div class="col-md-6 mb-3">
            <label for="email">Email</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-at"></i></span>
              </div>
            <input type="email" name="Email" value="{{$Student->Email}}" class="form-control" id="email" placeholder="Email" aria-describedby="email" required>
              <div class="invalid-feedback">
                Please enter your email.
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-3">
              <label for="email">Password</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
              <input type="password" name="Password" value="{{$Student->Password}}" class="form-control" id="email" placeholder="Email" aria-describedby="email" required>
                <div class="invalid-feedback">
                  Please enter your email.
                </div>
              </div>
            </div>
          <div class="col-md-6 mb-3">
            <label for="birthdate">Birth Date</label>
            <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
              <input type="text" name="Birthdate" value="{{$Student->Birthdate}}" class="form-control" data-toggle="datepicker" id="birthdate" placeholder="Birth Date" aria-describedby="birthdate" required>
                <div class="invalid-feedback">
                Please enter your Birth Date.
                </div>
            </div>
        </div>
          <div class="col-md-6 mb-3">
            <label for="phone">Phone Number</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
              <input type="text" name="Phone" value="{{$Student->Phone}}" class="form-control" id="phone" placeholder="Phone Number" aria-describedby="phone" required>
                <div class="invalid-feedback">
                     Please enter your phone number.
                </div>
            </div>
        </div>
          <div class="col-md-6 mb-3">
            <label for="ftime">First time of join</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                <input type="text" name="JoinDate" value="{{$Student->JoinDate}}" class="form-control" data-toggle="datepicker" id="ftime" aria-describedby="ftime" required>
                <div class="invalid-feedback">
                     Please enter time.
                </div>
            </div>
        </div>
         
          <div class="col-md-6 mb-3">
            <label for="Job">Job</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                </div>
              <input type="text" name="Job" value="{{$Student->Job}}" class="form-control" id="Job" placeholder="Job"  required>
                <div class="invalid-feedback">
                     Please enter Job title.
                </div>
            </div>
        </div>
          <div class="col-md-6 mb-3">
            <label for="Company">Company</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                </div>
              <input type="text" name="Company" value="{{$Student->Company}}" class="form-control" id="Company" placeholder="Company"  required>
                <div class="invalid-feedback">
                     Please enter Company name.
                </div>
            </div>
        </div>
          {{-- <div class="col-md-6 mb-3">
            <label for="iCourses">Internal Courses</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-desktop"></i></span>
                </div>
                <input type="text" name="InternalCourses" class="form-control" id="iCourses" placeholder="Enter courses ex: web,mobile" >
                <div class="invalid-feedback">
                     Please enter Courses names.
                </div>
            </div>
        </div>
          <div class="col-md-6 mb-3">
            <label for="eCourses">External Courses</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-desktop"></i></span>
                </div>
              <input type="text" name="ExternalCourses" value="{{$Student->ExternalCourses}}" class="form-control" id="eCourses" placeholder="Enter courses ex: web,mobile"  required>
                <div class="invalid-feedback">
                     Please enter Courses names.
                </div>
            </div>
        </div> --}}
        
         
          <div class="col-12 mb-3">
            <label for="about">
                additional info
            </label>
            <div class="input-group">
            <textarea name="AdditionalNotes" id="about" class="form-control" rows="10" placeholder="Additional info">{{$Student->AdditionalNotes}}</textarea>
               
            </div>
        </div>
        </div>
          
        <button class="btn btn-primary" type="submit">Save</button>
        </div>
       
      </form>

</div>

</div>
</div>

@endsection