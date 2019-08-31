<!DOCTYPE html>
<html lang="en">


<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DFS - Login</title>

   <!-- Custom fonts for this template-->
   <link href="{{ asset('adminvendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->

  <link href="{{ asset('admincss/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome To DFS!</h1>
                  </div>
                  
                  <form class="user" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                    <div class="form-group">
                      <input id="email" type="email"  class="form-control form-control-user"  aria-describedby="emailHelp" placeholder="Enter Email Address..."  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                             
                     
                      @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="form-group">
                      <input id="password" type="password"  class="form-control form-control-user"  placeholder="Password"  name="password" required autocomplete="current-password">
                      @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Login') }}
                                </button>

                    
                   
                  
                  </form>
                  <hr>
                  @if (Route::has('password.request'))
                  <div class="text-center">
                    <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                  </div>
                  @endif
                  @if (Route::has('register'))
                  <div class="text-center">
                    <a class="small" href="{{ route('register') }}">Create an Account!</a>
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


    <!-- Bootstrap core JavaScript-->
  
  <script src="{{ asset('adminvendor/jquery/jquery.min.js') }}"></script>
  
  <script src="{{ asset('adminvendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->

  <script src="{{ asset('adminvendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  
  <script src="{{ asset('adminjs/sb-admin-2.min.js') }}"></script>

</body>


</html>


