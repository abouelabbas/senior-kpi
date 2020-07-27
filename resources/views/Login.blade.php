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
  
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
   
    <!-- Mystic styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/logoIcon.png') }}">

</head>

<body class="ms-body   ms-primary-theme ms-has-quickbar">
    <div class="row no-gutters justify-content-center login-wrapper">
        <div class="col-md-6 col-10">
            <div class="login mt-5 p-5 bg-white">
                <div class="logo mb-4">
                    <img src="{{ asset('img/logo.png') }}" class="img-fluid" alt="">
                </div>
                <form action="/Proceed" method="POST" class="needs-validation" novalidate="">
                        {{ csrf_field() }}
                        <div class="mb-3">
                          <label for="userName">Email Address</label>
                          <div class="input-group">
                            <input type="email" name="Email" class="form-control" id="userName" placeholder="Enter Email Address" required="">
                            <div class="invalid-feedback">
                              Please provide a valid username.
                            </div>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="Password">Password</label>
                          <div class="input-group">
                            <input type="password" name="Password" class="form-control" id="Password" placeholder="Enter Password" required="">
                            <div class="invalid-feedback">
                              Please provide a password.
                            </div>
                          </div>
                        </div>
                        <!-- <div class="form-group">
                          <label class="ms-checkbox-wrap">
                            <input class="form-check-input" type="checkbox" value="">
                            <i class="ms-checkbox-check"></i>
                          </label>
                          <span> Remember Password </span>
                          <label class="d-block mt-3"><a href="#" class="btn-link" data-toggle="modal" data-target="#modal-12">Forgot Password?</a></label>
                        </div> -->
                        <button class="btn btn-primary mt-4 d-block w-100" type="submit">Log In</button>
                 </form>
            </div>
        </div>
    </div>
    <!-- SCRIPTS -->
    <!-- Global Required Scripts Start -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.js') }}"> </script>
    <!-- Global Required Scripts End -->
    <!-- Circular Progress Bar -->
  <script src="{{ asset('vendors/jquery-circle-progress/dist/circle-progress.min.js') }}"></script>

    <!-- Settings -->
    <script src="{{ asset('js/settings.js') }}"></script>

</body>

</html>