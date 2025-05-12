<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> E | Meds | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/../css/fontawesome-free-6.0.0-web/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="public/../css/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/../css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>E </b>| Meds</a>
  </div>
    
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-header">{{ __('User Login') }}</div>

    <div class="card-body">
        
        <form method="POST" id="frmlogin" action="{{ route('userlogincode') }}">
            @csrf

            <div class="input-group">
                <input type="email" name="email" placeholder="E-Mail" class="form-control @error('email') is-invalid @enderror " required >
                <div class="input-group-append ">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>  
                
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
            </div>
            <div class="row mb-4">
                <label for="email" id="email-error" style="color:red;" class="error ml-2 mb-auto" >{{ session('emailerror') }}</label>
            </div>
            <div class="input-group">
                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <div class="input-group-append " >
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="row mb-3">
                <label for="password" id="password-error" style="color:red;" class="error ml-2 mb-auto" >{{ session('passworderror') }}</label>
            </div>
            <div class="row mb-3">
                <div class="col-md-7 mt-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                        
                    </div>
                    
                </div>
                <div class="col-md-5">
                    <a href="{{ route('userregister') }}" class="btn btn-link">NEW USER?</a>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-8 offset-md-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                    <button type="reset" class="btn btn-danger">  
                        RESET  
                    </button>
                    {{-- @if (Route::has('password.request'))
                        <a class="btn btn-reset"  href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif --}}
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<!-- /.login-box -->


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function(){
        $("#frmlogin").validate({      
            rules:
            {
                email:{required:true,email:true},
                password:"required",
            },
            messages:
            {
                email:{required:"Please Enter E-Mail",email:"Invalid E-Mail Formate!"},
                password:"Please Enter Password",
            },
      });
    });
</script>
</html>
