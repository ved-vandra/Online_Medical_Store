@extends('layouts.usersview')

@section('content')
    <div class="container-fluid bg-secondary  mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">User Details</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('home') }}">Home</a></p>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-5">
        <meta name= "csrf-token" content="{{ csrf_token() }}" />
        <?php $user=session('user');?>
        <form action="{{ route('userupdate') }}" id="frmuser" method="POST">
        @csrf
            <div class="row px-xl-5">
                <div class="col-md-4 form-group">
                    <label for="fname"><h6>First Name</h6></label>
                    <input type="text" class="form-control" name="fname" value="{{$user['fname']}}">
                    <input type="hidden" class="form-control" name="id" value="{{$user['id']}}">
                    <label for="fname" class="error" style="color:red"></label>
                </div>
                <div class="col-md-4 form-group">
                    <label for="lname"><h6>Last Name</h6></label>
                    <input type="text" class="form-control" name="lname" value="{{$user['lname']}}">
                    <label for="lname" class="error" style="color:red"></label>
                </div>
                <div class="col-md-4 form-group">
                    <label for="email"><h6>E-Mail</h6></label>
                    <input type="text" class="form-control" name="email" value="{{$user['email']}}">
                    <label for="email" class="error" style="color:red"></label>
                </div>
                <div class="col-md-4 form-group">
                    <label for="phone"><h6>Phone Number</h6></label>
                    <input type="text" class="form-control" name="phone" value="{{$user['phone']}}">
                    <label for="phone" class="error" style="color:red"></label>
                </div>
                <div class="col-md-8 form-group">
                    <label for="address"><h6>Address</h6></label>
                    <textarea class="form-control" name="address" >{{ $user['address'] }}</textarea>
                    <label for="address" class="error" style="color:red"></label>
                </div>
                <div class="col-md-4 form-group">
                    <label for="city"><h6>City</h6></label>
                    <input type="text" class="form-control" name="city" value="{{$user['city']}}">
                    <label for="city" class="error" style="color:red"></label>
                </div>
                <div class="col-md-4 form-group">
                    <label for="zip"><h6>ZIP Code</h6></label>
                    <input type="text" class="form-control" name="zip" value="{{$user['zip']}}">
                    <label for="zip" class="error" style="color:red"></label>
                </div>
                <div class="col-md-4 form-group">
                    <label for="Country"><h6>Country</h6></label>
                    <select name="country" id="country" class="form-control">
                        <option {{$user['country'] ==  'United States' ? 'selected' : ''}}>United States</option>
                        <option {{$user['country'] ==  'Afghanistan' ? 'selected' : ''}}>Afghanistan</option>
                        <option {{$user['country'] ==  'Albania' ? 'selected' : ''}}> Albania</option>
                        <option {{$user['country'] ==  'Algeria' ? 'selected' : ''}}>Algeria</option>
                    </select>
                    <label for="country" class="error" style="color:red"></label>
                </div>
                <div class="col-md-12 text-right"><button type="submit" class="btn btn-info rounded" > Update</button></div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#frmuser").validate({   
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
                    address:"enter Your Address",
                    city:"enter City name",
                    zip:{required:"enter Zip Code",number:"Zip code must be integer"},
                    country:"Select Country name",
                },
            });
        });
    </script>
@endsection