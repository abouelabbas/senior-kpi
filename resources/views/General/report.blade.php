<!DOCTYPE html>
<html lang="en">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Senior Consulting</title>

  <!-- Iconic Fonts -->

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link href="{{ asset('vendors/iconic-fonts/font-awesome/css/all.min.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('vendors/iconic-fonts/flat-icons/flaticon.css') }}">

  <link rel="stylesheet" href="{{ asset('vendors/iconic-fonts/cryptocoins/cryptocoins.css') }}">

  <link rel="stylesheet" href="{{ asset('vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css') }}">

  <!-- Bootstrap core CSS -->

  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

   <!-- Date picker -->

   <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">

  <!-- jQuery UI -->

  <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">

  <!-- Page Specific CSS (Slick Slider.css) -->

  <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">

  <link href="{{ asset('css/slick.css') }}" rel="stylesheet">

  <!-- Mystic styles -->

  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style_rep.css') }}" rel="stylesheet">

  <!-- Favicon -->

  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/logoIcon.png') }}">

</head>

<body class="ms-body ms-primary-theme ms-has-quickbar">

<div class="container-fluid bg-white py-3">
  <div class="container bg-white text-center">
    <img src="{{asset("img/logo.png")}}" width="200px" alt="">
  </div>
</div>
<div class="container">
    <div class="view-account">
        <section class="module">
            <div class="module-inner">
                <div class="side-bar">
                    <div class="user-info">
                        <img class="img-profile img-circle img-responsive center-block" style="border-radius: 50%" src="{{ $Student->ImagePath ?  "/storage/app/public/$Student->ImagePath" : "https://t4.ftcdn.net/jpg/04/10/43/77/360_F_410437733_hdq4Q3QOH9uwh0mcqAhRFzOKfrCR24Ta.jpg" }}" alt="">
                        <ul class="meta list list-unstyled">
                            <li class="name">{{$Student->FullnameEn}}
                                <label class="label label-info">{{$Student->Job}}</label>
                            </li>
                            <li class="email"><a href="#">{{$Student->Email}}</a></li>
                            
                        </ul>
                    </div>
            		<nav class="side-menu">
        				<ul class="nav" id="scrollspy">
        					<li class="active"><a href="#personal"><span class="fa fa-user"></span> Personal Information</a></li>
        					<li><a href="#contact"><i class="fas fa-id-card"></i> Contact Information</a></li>
        					<li><a href="#courses"><i class="fas fa-book"></i> Courses</a></li>
        					<li><a href="#attendance"><i class="fas fa-user-check"></i> Attendance</a></li>
        					
        					<li><a href="#tasks"><i class="fas fa-tasks"></i> Solved Tasks</a></li>
        					<li><a href="#exams"><i class="fas fa-keyboard"></i> Taken Exams</a></li>
        					<li><a href="#eval"><i class="fas fa-medal"></i> Center Evaluation</a></li>
        				</ul>
        			</nav>
                </div>
                <div class="content-panel">
                    <h2 class="title">Student Progress Final Report</h2>
                    <form class="form-horizontal">
                        <fieldset id="personal" class="fieldset">

                            <h3 class="fieldset-title">Personal Info</h3>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group ms-custom">
                                    <label class="control-label fw-bold">Full Name</label>
                                    <div class="">
                                      {{$Student->FullnameEn}}
                                    </div>
                                </div>
                              </div>
                              @if ($Student->Birthdate != null)
                                <div class="col-md-6">
                                  <div class="form-group ms-custom">
                                      <label class="control-label fw-bold">Birthdate</label>
                                      <div class="">
                                        {{$Student->Birthdate}}
                                      </div>
                                  </div>
                                </div>
                              @endif
                              @if ($Student->Job != null)
                                <div class="col-md-6">
                                  <div class="form-group ms-custom">
                                      <label class="control-label fw-bold">Job</label>
                                      <div class="">
                                        {{$Student->Job}}
                                      </div>
                                  </div>
                                </div>
                              @endif
                              @if ($Student->Company != null)
                                <div class="col-md-6">
                                  <div class="form-group ms-custom">
                                      <label class="control-label fw-bold">Company</label>
                                      <div class="">
                                        {{$Student->Company}}
                                      </div>
                                  </div>
                                </div>
                              @endif
                              
                              
                            </div>
                          </fieldset>
                          <br>
                          <fieldset id="contact" class="fieldset mb-0">
                            <h3 class="fieldset-title">Contact Info</h3>
                            <div class="row">
                              
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-2  col-sm-3 col-xs-12 control-label">Phone</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <i class="fas fa-phone"></i> | {{$Student->Phone}}
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-2  col-sm-3 col-xs-12 control-label">Phone</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <i class="fab fa-whatsapp"></i> | {{$Student->Whatsapp}}
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-2  col-sm-3 col-xs-12 control-label">Email</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <i class="fas fa-at"></i> | {{$Student->Email}}
                                    </div>
                                </div>
                              </div>
                              @if($Student->GithubLink)
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-2  col-sm-3 col-xs-12 control-label">GitHub</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <i class="fab fa-github"></i> | <a href="{{ $Student->GithubLink }}">{{$FirstName}}'s GitHub Profile</a>
                                    </div>
                                </div>
                              </div>
                              @endif
                              @if($Student->Linkedin)
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-2  col-sm-3 col-xs-12 control-label">Linkedin</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <i class="fab fa-linkedin"></i> | <a href="{{ $Student->Linkedin }}">{{$FirstName}}'s Linkedin Profile</a>
                                    </div>
                                </div>
                              </div>
                              @endif
                              @if($Student->Facebook)
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-2  col-sm-3 col-xs-12 control-label">Facebook</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <i class="fab fa-facebook-square"></i> | <a href="{{$Student->Facebook}}">{{$FirstName}}'s FB Profile</a>
                                    </div>
                                </div>
                              </div>
                              @endif
                            </div>
                        </fieldset>
                        <br>
                        <div class="courses" id="courses">
                            <h3 class="fieldset-title">Courses</h3>
                            <div class="course">
                              <h4>
                                {{$Course->CourseNameEn}} - G{{$Round->GroupNo}} 
                                <span class="float-right">
                                  <span class="badge bg-info text-white">{{$Course->Duration}} Hours</span>
                                </span>
                              </h4>
                              <div class="row">
                                <div class="col-md-6 offset-md-3 p-3" id="attendance">
                                  <div class="row stat-rp">
                                      <div class="information-box">
                                            <div class="information-left">
                                                <div><span class="text-info"><strong>{{$SessionsCount}}</strong></span></div>
                                                <div><span class="text-info">Sessions</span></div>
                                            </div>
                                            <div class="information-middle">
                                                <div><span class="text-success"><strong>{{$Attended}}</strong></span></div>
                                                <div><span class="text-success">Attended</span></div>
                                            </div>
                                            <div class="information-right">
                                                <div><span class="text-warning"><strong>{{$SubmittedTasks}}/{{count($Grades)}}</strong></span></div>
                                                <div><span class="text-warning">Solved Tasks</span></div>
                                            </div>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-12">
                                  <h5>Attendance Table</h5>
                                  <table class="table table-hover rp-table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Session Number</th>
                                        <th scope="col">Attendance</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($Attendance as $index => $attend)
                                        
                                      <tr>

                                        <th scope="row">{{$index + 1}}</th>
                                        <td>Session {{$attend->SessionNumber}}</td>
                                        @if($attend->IsAttend == 1)
                                        <td class="text-success">Attended</td>
                                        @elseif($attend->IsAttend == 2)
                                        <td class="text-success">Attended Online</td>
                                        @elseif($attend->IsAttend == 0 || $attend->IsAttend == null)
                                        <td class="text-danger">Absent</td>
                                        @endif
                                      </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                                <div class="col-12" id="tasks">
                                  <h5>Tasks Table</h5>
                                  <table class="table table-hover rp-table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Task Description</th>
                                        <th scope="col">Solution</th>
                                        <th scope="col">Evaluation</th>
                                        <th scope="col">Comments</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($Grades as $index => $Grade)
                                      <tr
                                      {{-- @if ($Grade->TaskURL == null)
                                          class="grad-danger"
                                      @elseif($Grade->TaskURL != null && $Grade->TaskGrade == null)
                                          class="grad-warning"
                                      @else
                                          class="grad-success"
                                      @endif --}}
                                      >
                                        <th scope="row">{{$index + 1}}</th>
                                        <td>
                                          <a href="{{$Grade->SessionTask}}"><i class="fas fa-link"></i> Task {{$Grade->SessionNumber}} Description</a>
                                        </td>
                                        @if ($Grade->TaskURL != null)
                                        <td class="">
                                          <a href="{{$Grade->TaskURL}}"><i class="fas fa-link"></i> Task {{$Grade->SessionNumber}} Solution</a>
                                        </td>
                                            
                                        <td class="text-success">{{$Grade->TaskGrade}}/100</td>
                                        <td class="text-success">{{$Grade->TaskComment}}</td>
                                        @else
                                            <td colspan="3" class="text-danger text-center">Not Solved</td>
                                            {{-- <td></td> --}}
                                        @endif
                                      </tr>
                                          
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                                <div class="col-12" id="exams">
                                  <h5>Exams Table</h5>
                                  <table class="table table-hover rp-table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Exam Name</th>
                                        <th scope="col">Grade</th>
                                        <th scope="col">Comments</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($ExamGrades as $index => $Exam)
                                          
                                      <tr>
                                        <th scope="row">{{$index + 1}}</th>
                                        <td>
                                          {{$Exam->ExamNameEn}}
                                        </td>
                                        <td class="text-success">{{$Exam->Grade ? $Exam->Grade : "-"}}/100</td>
                                        <td class="text-success">{{$Exam->ExamNotes}}</td>
                                      </tr>
                                      @endforeach
                                      
                                    </tbody>
                                  </table>
                                </div>
                                <div class="col-12" id="eval">
                                  <h5>Center Evaluation</h5>
                                  <div class="alert alert-info" role="alert">
                                    For inquiries about Abdallah's evaluation from our side as it's confidential, please contact us on (01097003465 - 01090873748)
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <hr>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>





  <!-- SCRIPTS -->

  <!-- Global Required Scripts Start -->

  <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

  <script src="{{ asset('js/popper.min.js') }}"></script>

  <script src="{{ asset('js/bootstrap.min.js') }}"></script>

  <script src="{{ asset('js/perfect-scrollbar.js') }}"> </script>

  <script src="{{ asset('js/jquery-ui.min.js') }}"> </script>

  <!-- Global Required Scripts End -->



  <!-- Page Specific Scripts Start -->

  <script src="{{ asset('js/slick.min.js') }}"> </script>

  <script src="{{ asset('js/moment.js') }}"> </script>

  <script src="{{ asset('js/jquery.webticker.min.js') }}"></script>

  <script src="{{ asset('js/Chart.bundle.min.js') }}"> </script>

  <script src="{{ asset('js/Chart.Financial.js') }}"> </script>

  <script src="{{ asset('js/cryptocurrency.js') }}"> </script>

  <!-- Page Specific Scripts Finish -->

 <!-- Date picker -->

 <script src="{{ asset('js/datepicker.min.js') }}"></script>



  

  <!-- Page Specific Scripts Start -->

  <script src="{{ asset('js/datatables.min.js') }}"> </script>

  <script src="{{ asset('js/data-tables.js') }}"> </script>

  <!-- Page Specific Scripts End -->

    <!-- Circular Progress Bar -->

  <script src="{{ asset('vendors/jquery-circle-progress/dist/circle-progress.min.js') }}"></script>

  <!-- Mystic core JavaScript -->

  <script src="{{ asset('js/framework.js') }}"></script>



  <!-- Settings -->

  <script src="{{ asset('js/Datasave2.js') }}"></script>

  <script src="{{ asset('js/settings.js') }}"></script>


  <script src="{{ asset('js/jquery.form.js') }}"></script>



</body>

</html>
