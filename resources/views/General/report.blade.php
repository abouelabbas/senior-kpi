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
                        <img class="img-profile img-circle img-responsive center-block" style="border-radius: 50%" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        <ul class="meta list list-unstyled">
                            <li class="name">Abdallah Ahmed Ali
                                <label class="label label-info">Software Engineer</label>
                            </li>
                            <li class="email"><a href="#">abdallah@gmail.com</a></li>
                            
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
                                    <label class="control-label fw-bold">User Name</label>
                                    <div class="">
                                      abdallahahmedali
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group ms-custom">
                                    <label class="control-label fw-bold">First Name</label>
                                    <div class="">
                                      Abdallah
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group ms-custom">
                                  <label class="control-label fw-bold">Last Name</label>
                                  <div class="">
                                    Ahmed Ali
                                  </div>
                                </div>
                              </div>
                            </div>
                          </fieldset>
                          <br>
                          <fieldset id="contact" class="fieldset mb-0">
                            <h3 class="fieldset-title">Contact Info</h3>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-2  col-sm-3 col-xs-12 control-label">Email</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <i class="fas fa-at"></i> | abdallah@gmail.com
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-2  col-sm-3 col-xs-12 control-label">GitHub</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <i class="fab fa-github"></i> | <a href="">Abdallah's GitHub Profile</a>
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-2  col-sm-3 col-xs-12 control-label">Linkedin</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <i class="fab fa-linkedin"></i> | <a href="">Abdallah's Linkedin Profile</a>
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-2  col-sm-3 col-xs-12 control-label">Facebook</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <i class="fab fa-facebook-square"></i> | <a href="">Abdallah's FB Profile</a>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </fieldset>
                        <br>
                        <div class="courses" id="courses">
                            <h3 class="fieldset-title">Courses</h3>
                            <div class="course">
                              <h4>
                                1. Front-end Development 
                                <span class="float-right">
                                  <span class="badge bg-info text-white">160 Hours</span>
                                </span>
                              </h4>
                              <div class="row">
                                <div class="col-md-6 offset-md-3 p-3" id="attendance">
                                  <div class="row stat-rp">
                                      <div class="information-box">
                                            <div class="information-left">
                                                <div><span class="text-info"><strong>67</strong></span></div>
                                                <div><span class="text-info">Sessions</span></div>
                                            </div>
                                            <div class="information-middle">
                                                <div><span class="text-success"><strong>62</strong></span></div>
                                                <div><span class="text-success">Attended</span></div>
                                            </div>
                                            <div class="information-right">
                                                <div><span class="text-warning"><strong>124</strong></span></div>
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
                                      <tr>
                                        <th scope="row">1</th>
                                        <td>Session 1</td>
                                        <td class="text-success">Attended</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">2</th>
                                        <td>Session 2</td>
                                        <td class="text-success">Attended</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">3</th>
                                        <td>Session 3</td>
                                        <td class="text-success">Attended</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">4</th>
                                        <td>Session 4</td>
                                        <td class="text-danger">Absent</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">5</th>
                                        <td>Session 5</td>
                                        <td class="text-success">Attended</td>
                                      </tr>
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
                                      <tr>
                                        <th scope="row">1</th>
                                        <td>
                                          <a href=""><i class="fas fa-link"></i> Task 1 Description</a>
                                        </td>
                                        <td class="">
                                          <a href=""><i class="fas fa-link"></i> Task 1 Solution</a>
                                        </td>
                                        <td class="text-success">88/100</td>
                                        <td class="text-success">Great Job!</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">2</th>
                                        <td>
                                          <a href=""><i class="fas fa-link"></i> Task 2 Description</a>
                                        </td>
                                        <td class="">
                                          <a href=""><i class="fas fa-link"></i> Task 2 Solution</a>
                                        </td>
                                        <td class="text-warning">70/100</td>
                                        <td class="text-warning">Good but needs some modifications!</td>
                                      </tr>
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
                                      <tr>
                                        <th scope="row">1</th>
                                        <td>
                                          HTML - CSS Exam
                                        </td>
                                        <td class="text-success">88/100</td>
                                        <td class="text-success">Great Job!</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">2</th>
                                        <td>
                                          JavaScript Exam
                                        </td>
                                        <td class="text-warning">70/100</td>
                                        <td class="text-warning">Good with some revision you'll get better</td>
                                      </tr>
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
