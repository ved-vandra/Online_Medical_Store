<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/../css/fontawesome-free-6.0.0-web/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/../css/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/../css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
  <!-- /.login-logo -->
        <div class="card">
            <div class="card-header">{{ __('Register') }}</div>
            <div class="card-body">
                <form method="POST" id="regform" action="{{ route('register') }}">
                    @csrf

                    <div class="input-group row">
                        <input id="name" type="text" placeholder="Username" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <div class="input-group-append ">
                            <div class="input-group-text">
                                <span style="width: 15px;" class="fas fa-user"></span>
                            </div>
                        </div> 
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="name" id="name-error" style="color:red;" class="error ml-2 mb-auto" ></label>
                    </div>

                    <div class="input-group row">
                        <input id="email" type="email" placeholder="E-Mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <div class="input-group-append ">
                            <div class="input-group-text">
                                <span style="width: 15px;" class="fas fa-envelope"></span>
                            </div>
                        </div> 
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="email" id="email-error" style="color:red;" class="error ml-2 mb-auto" ></label>
                    </div>

                    <div class="input-group row">
                        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <div class="input-group-append ">
                            <div class="input-group-text">
                                <span style="width: 15px;" class="fas fa-user-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="password" id="password-error" style="color:red;" class="error ml-2 mb-auto" ></label>
                    </div>

                    <div class="input-group row">
                        <input id="confirmpassword" type="password" placeholder="Confirm-Password" class="form-control" name="confirmpassword" required autocomplete="new-password">
                        <div class="input-group-append ">
                            <div class="input-group-text">
                                <span style="width: 15px;" class="fas fa-user-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="confirmpassword" id="confirmpassword-error" style="color:red;" class="error ml-2 mb-auto" ></label>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-7"></div>
                        <div class="col-md-5">
                            <a href="{{ route('login') }}" style="width: 126px;" class="btn btn-outline-danger">LOGIN</a>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-12">
                            <button type="submit"  class="btn bg-gradient-success btn-block">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function(){
    $("#regform").validate({      
        rules:{
            name:"required",
            email:"required",
            password:"required",
            confirmpassword:{
                                required:true,
                                equalTo:"#password",
                            }
        },
        messages:
        {
            name:"please enter Username!",
            email:"please enter E-Mail!",
            password:"Please enter Password!",
            confirmpassword:{
                                required:"Please Confirm Password!",
                                equalTo: "Password Does Not Match!",
                            },
        },
    });
  });
</script>
</html>