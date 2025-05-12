

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
    <link href="public/../js/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="public/../css/style.css" rel="stylesheet">

    {{-- jquery links --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="public/../js/lib/easing/easing.min.js"></script>
    <script src="public/../js/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="public/../js/mail/jqBootstrapValidation.min.js"></script>
    <script src="public/../js/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="public/../js/main.js"></script>
</head>

<body>
    @if (!session('user'))
        <script type="text/javascript">
            window.location = "{{ route('userlogin') }}";//here double curly bracket
        </script>
    @endif
    <!-- Topbar Start -->
    <div class="container-fluid">
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
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{ route('welcome') }}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold">
                        <span class="text-primary font-weight-bold border px-3 mr-1">E</span>Meds
                    </h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="{{route('cart')}}" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">@if(session('cart')){{ count(session('cart')) }} @else 0 @endif</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid ">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav  mr-auto py-0" style="padding: 50px ">
                    <a href="{{ route('home')}}" class="nav-item nav-link mr-2">Home</a>
                    <a href="{{ route('shop') }}" class="nav-item nav-link mr-2">Shop</a>
                    <a href="{{ route('cart') }}" class="nav-item nav-link mr-2">Shopping Cart</a>
                    @if (!session('user'))
                        <a href="{{ route('checkout') }}" class="nav-item nav-link mr-2">Checkout</a>
                    @endif 
                </div>
                <div class="navbar-nav ml-auto py-0">
                    @if (session('user'))
                        <div class="nav-item dropdown mr-5">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">user</a>
                            <div class="dropdown-menu rounded dropdown-menu-right m-0">
                                <a href="{{ route('userdetails') }}" class="dropdown-item">Details</a>
                                <a href="{{ route('userorders') }}" class="dropdown-item">Orders</a>
                                <a href="{{ route('userlogout') }}" class="dropdown-item bg-danger text-white">LOGOUT</a>
                            </div>
                        </div>
                        
                    @else
                    
                        <a href="{{ route('userlogin') }}" class="nav-item nav-link">Login</a>
                        {{-- <a href="{{ route('register') }}" class="nav-item nav-link">Register</a> --}}
                    
                    @endif
                </div>
            </div>
        </nav>
    </div>
    
    <!-- Navbar End -->

    {{-- content --}}
    
    @yield('content')

    {{-- end content --}}

    {{-- footer --}}

    @include('footer')

    {{-- end footer --}}


    <!-- JavaScript Libraries -->
    

    
    <script>
    

    $('.remove-from-cart').click(function(e){
        e.preventDefault();
        var ele =$(this);
        // if(confirm('are you sure')){
            $.ajax({
                url:'{{ url('remove-from-cart') }}',
                method:'GET',
                data:{_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                success:function(response){
                    window.location.reload();
                }
            })
        // }
    });
    $(".quantity").click(function(e){
        e.preventDefault();

        var ele=$(this);
        
        $.ajax({
            url:'{{ url('update-cart') }}',
            method:'GET',
            data:{_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity:ele.parents("tr").find(".quantity").val()},
            success:function(response)
            {
                window.location.reload();
            }
        });
    });
    </script>
    
</body>

</html>