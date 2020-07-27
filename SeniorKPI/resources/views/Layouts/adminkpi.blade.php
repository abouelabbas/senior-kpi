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
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
  <!-- Mystic styles -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/logoIcon.png') }}">

</head>

<body class="ms-body ms-primary-theme ms-has-quickbar">

  <!-- Pre LOADER -->
  <div id="LoaderWrapper">
      <div class="spinner spinner-4">
          <div class="cube1"></div>
          <div class="cube2"></div>
        </div>
  </div>
  <!-- /Pre LOADER -->


  <!-- Overlays -->
  <div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
  <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>

  <!-- Sidebar Navigation Left -->
  <aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">

    <!-- Logo -->
    <div class="logo-sn ms-d-block-lg">
      <a class="pl-0 ml-0 text-center" href="/"> <img src="{{ asset('img/logo.png') }}" alt="logo"> </a>
    </div>

    <!-- Navigation -->
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
        <!-- Dashboard -->
        <li class="menu-item ">
            <a class=" active" href="index.html">
                <span><i class="material-icons fs-16">dashboard</i>Dashboard </span>
            </a>
           
        </li>
         <!-- Create  -->
         <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#create" aria-expanded="false" aria-controls="tables">
            <span><i class="material-icons fs-16">tune</i>Crud</span>
          </a>
          <ul id="create" class="collapse" aria-labelledby="tables" data-parent="#side-nav-accordion">
            <li> <a href="/Admin/Courses">Course</a> </li>
            <li> <a href="/Admin/Trainers">Trainer</a> </li>
            <li> <a href="/Admin/Rounds">Round</a> </li>
            <li> <a href="/Admin/Students">Students</a> </li>
            <li> <a href="/Admin/Labs">Labs</a> </li>
            <li> <a href="/Admin/Branches">Branch</a> </li>
          </ul>
      </li>
      <!--  Create  -->
        
      <!-- Profile   -->
      <!-- Course  -->
      <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#basic-elements" aria-expanded="false" aria-controls="basic-elements">
          <span><i class="material-icons fs-16">filter_list</i>My Courses</span>
        </a>
          <ul id="basic-elements" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
            @foreach ($ActiveRounds as $Round)
            <li class="menu-item">
            <a href="#" class="has-chevron collapsed" data-toggle="collapse" data-target="#course-detils{{$Round->RoundId}}" aria-expanded="false" aria-controls="authentication">{{$Round->CourseNameEn}} GR {{$Round->GroupNo}}</a>
            <ul id="course-detils{{$Round->RoundId}}" class="collapse" aria-labelledby="course-detils" data-parent="#basic-elements">
            <li> <a href="/Admin/Courses/{{$Round->RoundId}}">Course Progress</a> </li>
            <li> <a href="/Admin/Evaluations/{{$Round->RoundId}}">Evaluations</a> </li>
            <li> <a href="/Admin/CenterEvaluation/{{$Round->RoundId}}">Trainer-Center Eval</a> </li>
              </ul>
            </li>
            @endforeach
           
          </ul>
        </li>
    <!--  Course  -->
       
      
        <!-- Chat -->
        {{-- <li class="menu-item">
            <a href="chat.html">
              <span><i class="material-icons fs-16">comment</i>Chat</span>
            </a>
           
        </li> --}}
        <!-- /Chat -->
    </ul>


  </aside>


  <!-- Main Content -->
  <main class="body-content">

    <!-- Navigation Bar -->
    <nav class="navbar ms-navbar">

      <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft">
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
      </div>

      <div class="logo-sn logo-sm ms-d-block-sm">
        <a class="pl-0 ml-0 text-center navbar-brand mr-0" href="index.html"><img src="../assets/img/logo-sm-dark.png" alt="logo"> </a>
      </div>

      <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">
      
        {{-- <li class="ms-nav-item dropdown">
          <a href="#" class="text-disabled ms-has-notification" id="mailDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>10</span>
            <i class="flaticon-speech-bubble"></i></a>
          <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="mailDropdown">
            <li class="dropdown-menu-header">
              <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Messages</span></h6><span class="badge badge-pill badge-success">3 New</span>
            </li>
            <li class="dropdown-divider"></li>
            <li class="ms-scrollable ms-dropdown-list">
              <a class="media p-2" href="chat.html">
                <div class="ms-chat-status ms-status-offline ms-chat-img mr-2 align-self-center">
                  <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
                </div>
                <div class="media-body">
                  <span>Hey man, looking forward to your new project.</span>
                  <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 30 seconds ago</p>
                </div>
              </a>
              <a class="media p-2" href="chat.html">
                <div class="ms-chat-status ms-status-online ms-chat-img mr-2 align-self-center">
                  <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
                </div>
                <div class="media-body">
                  <span>Dear John, I was told you bought Mystic! Send me your feedback</span>
                  <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 28 minutes ago</p>
                </div>
              </a>
              <a class="media p-2" href="chat.html">
                <div class="ms-chat-status ms-status-offline ms-chat-img mr-2 align-self-center">
                  <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
                </div>
                <div class="media-body">
                  <span>How many people are we inviting to the dashboard?</span>
                  <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 6 hours ago</p>
                </div>
              </a>
            </li>
          </ul>
        </li> --}}
        
        <li class="ms-nav-item dropdown">
          <a href="#" class="text-disabled ms-has-notification" data-type="Admin" data-id="{{session('Id')}}" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>{{$CountNotifications}}</span>
            <i class="flaticon-bell"></i></a>
          <ul class="dropdown-menu dropdown-menu-right" style="height:300px;overflow-y:auto;" aria-labelledby="notificationDropdown">
            <li class="dropdown-menu-header">
              <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Notifications</span></h6><span class="badge badge-pill badge-info">{{$CountNotifications}} New</span>
            </li>
            <li class="dropdown-divider"></li>
            <li class="ms-scrollable ms-dropdown-list">
@foreach ($Notifications as $Notification)
                  <a class="media p-2">
                <div class="media-body">
                  <span>{{$Notification->Notification}}</span>
                  <p class="fs-10 my-1 text-disabled"><i class="material-icons"></i> {{ Carbon\Carbon::parse($Notification->NotificationDate)->diffForHumans()}}</p>
                </div>
              </a>
@endforeach


            </li>
            <li class="dropdown-divider"></li>
            {{-- <li class="dropdown-menu-footer text-center">
              <a href="#">View all Notifications</a>
            </li> --}}
          </ul>
        </li>
      
        <li class="ms-nav-item ms-nav-user dropdown">
          <a href="#"   id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
            <img class="ms-user-img ms-img-round float-left" style="height:35px;width:35px;" src="https://via.placeholder.com/270x270" alt="people"> 
            <span class="float-right">{{@session('NameEn')}}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-right user-dropdown" aria-labelledby="userDropdown">
            <li class="dropdown-menu-header">
              <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Welcome, {{@session('NameEn')}}</span></h6>
            </li>
            <li class="dropdown-divider"></li>
            <li class="ms-dropdown-list">
              <a class="media fs-14 p-2" href="/Admin/Profile/{{session('Id')}}"> <span><i class="flaticon-user mr-2"></i> Profile</span> </a>
            </li>
            <li class="dropdown-divider"></li>
            
            <li class="dropdown-menu-footer">
              <a class="media fs-14 p-2" href="/Logout"> <span><i class="flaticon-shut-down mr-2"></i> Logout</span> </a>
            </li>
          </ul>
        </li>
      </ul>

      <div class="ms-toggler ms-d-block-sm pr-0 ms-nav-toggler" data-toggle="slideDown" data-target="#ms-nav-options">
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
      </div>

    </nav>

    
      <!-- Body Content Wrapper -->
      <div class="ms-content-wrapper">
          @yield('content');
        </div>

    
    </main>
  
  
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
      <script src="{{ asset('js/select2.min.js') }}"></script>
  
    
    <!-- Page Specific Scripts Start -->
    <script src="{{ asset('js/datatables.min.js') }}"> </script>
    <script src="{{ asset('js/data-tables.js') }}"> </script>
    <!-- Page Specific Scripts End -->
  <!-- Circular Progress Bar -->
  <script src="{{ asset('vendors/jquery-circle-progress/dist/circle-progress.min.js') }}"></script>
    <!-- Mystic core JavaScript -->
    <script src="{{ asset('js/framework.js') }}"></script>
  
    <!-- Settings -->
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/Datasave.js') }}"></script>
  @yield('scripts')
  </body>
  
  </html>
  