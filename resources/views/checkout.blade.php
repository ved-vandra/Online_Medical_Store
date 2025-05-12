@extends('layouts.app')

@section('content')
    
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('home') }}">Home</a></p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <meta name= "csrf-token" content="{{ csrf_token() }}" />
        <form action="{{ route('saveorder') }}" id="frmcheckout" method="POST">
        @csrf
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" name="fname" placeholder="John">
                            <input type="hidden" class="form-control" name="id">
                            <label for="fname" class="error" id="fname-error" style="color: red;"></label>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" name="lname" placeholder="Doe">
                            <label for="lname" class="error" id="lname-error" style="color: red;"></label>
                        </div>
                        <div class="col-md-6  form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" name="email"placeholder="example@email.com">
                            <label for="email" class="error" id="email-error" style="color: red;"></label>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" name="phone" placeholder="+123 456 789">
                            <label for="phone" class="error" id="phone-error" style="color: red;"></label>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" id="password" name="password" placeholder="********">
                            <label for="password" class="error" id="password-error" style="color: red;"></label>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Confirm Password</label>
                            <input class="form-control" type="password" name="cpassword" placeholder="********">
                            <label for="cpassword" class="error" id="cpassword-error" style="color: red;"></label>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <textarea class="form-control" type="textarea"name="address" placeholder="123 Street"></textarea>
                            <label for="address" class="error" id="address-error" style="color: red;"></label>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" name="city" placeholder="New York">
                            <label for="city" class="error" id="city-error" style="color: red;"></label>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text"name="zip" placeholder="123">
                            <label for="zip" class="error" id="zip-error" style="color: red;"></label>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select" name="country">
                                <option value="" hidden>Select Country</option>
                                <option>United States</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                            </select>
                            <label for="country" class="error" id="country-error" style="color: red;"></label>
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        <?php $totalqty = 0;$totalprice=0; ?>
                        @if (session('cart'))
                            @foreach(session('cart') as $id =>$product)
                                <?php $totalqty += $product['quantity']?>
                                <?php $totalprice += $product['price'] * $product['quantity']?>
                                <div class="d-flex justify-content-between">
                                    <p>{{ $product['pname']}}</p>
                                    <p>{{ $product['price']*$product['quantity'] }}</p>
                                </div>
                            @endforeach
                        @endif
                        
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">{{ $totalprice }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">GST(10%)</h6>
                            <h6 class="font-weight-medium">{{$totalafter=$totalprice*10/100}}</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">{{ $totalafter+$totalprice }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-footer border-secondary bg-transparent">
                        <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
    <!-- Checkout End -->
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#frmcheckout").validate({   
            rules:{
                fname:"required",
                lname:"required",
                email:  {
                            required:true,
                            email:true,
                            remote: {
                                        url:'{{ route("emailuserunique") }}',
                                        type:'POST',
                                        data:{
                                            email:function(){
                                                return $('#frmcheckout :input[name="email"]').val();
                                            },
                                            id:function(){
                                                return $('#frmcheckout :input[name="id"]').val();
                                            }
                                        }
                                    },
                        },
                phone:{required:true,number:true,minlength:8},
                password:"required",
                cpassword:{required:true, equalTo: "#password"},
                address:"required",
                city:"required",
                zip:{required:true,number:true,minlength:5,maxlength:10},
                country:"required",
            },
            messages:
            {
                fname:"enter first name",
                lname:"enter last name",
                email:  {
                            required:"enter E-Mail",
                            email:"please enter valid email address",
                            remote:"E-Mail Already Exists!",
                        },
                phone:{required:"enter phone number",numbers:"Phone number must be integer"},
                password:{required:'Password is Required!'},
                cpassword:{required:'Confirm Your Password',equalTo:'Password Does Not Match!',},
                address:"enter Your Address",
                city:"enter City name",
                zip:{required:"enter Zip Code",number:"Zip code must be integer"},
                country:"Select Country name",
            },
        });
    });
</script>

@endsection