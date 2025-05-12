

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E-Commerce Site</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/../js/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/../css/style.css" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="row bg-secondary py-2 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark" href="">FAQs</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Help</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Support</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark px-2" href="">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-dark pl-2" href="">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="login-box">
    <div class="card">
        <div class="card-header">{{ __('Login') }}</div>

        <div class="card-body">
            <form method="POST" id="frmlogin" action="{{ route('login') }}">
                @csrf

                <div class="input-group">
                    <input type="email" name="email" placeholder="E-Mail" class="form-control @error('email') is-invalid @enderror " required >
                    <div class="input-group-append ">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>  
                    <td>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </td>
                </div>
                <div class="row mb-4">
                    <label for="email" id="email-error" style="color:red;" class="error ml-2 mb-auto" ></label>
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
                    <label for="password" id="password-error" style="color:red;" class="error ml-2 mb-auto" ></label>
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
                        <a href="{{ route('register') }}" class="btn btn-link">NEW USER?</a>
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
    <footer>
        @include('footer')
    </footer>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function(){
        $("#frmlogin").validate({      
            rules:
            {
                email:"required",
                password:"required",
            },
            messages:
            {
                email:"Please Enter E-Mail",
                password:"Please Enter Password",
            },
      });
    });
</script>
</html>

