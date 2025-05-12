@extends('layouts.app')

@section('content')
@include('slider')
    @if(session('success'))
        <div class="alert alert-info alert-dismissible fade-show ml-5 mr-5" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('danger'))
        <div class="alert alert-danger alert-dismissible fade-show ml-5 mr-5" role="alert">
            {{ session('danger') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- Featured Start -->
    <div class="container-fluid pt-5" id="here">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->
    
    <!-- Products Start -->
        <div class="container-fluid pt-5" id="products">
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2">All Products</span></h2>
                <div class="text-right mr-5">
                    <a href="" class="bg-primary text-white px-3 py-2" data-toggle="dropdown">select stock status</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('subcategoryproducts',$sid) }}#products" class="dropdown-item">All</a>
                        <a href="{{ route('subcatestock',[$sid,"stock"=>'in']) }}" class="dropdown-item">in stock</a>
                        <a href="{{ route('subcatestock',[$sid,"stock"=>'out']) }} " class="dropdown-item">out of stock</a>
                    </div>
                </div>
            </div>
            <div class="row px-xl-5 pb-3">
                @foreach ($product as $prod)
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0" style="text-align: center">
                                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner border">
                                        @foreach ($prod->iname as $key=>$images)
                                            <div class="carousel-item  @if($key == 0) active @endif">
                                                <img class="img-fluid" style=" height: 35vh; width:75%;" src="public/../uploads/{{ $images->iname }}" alt="">    
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-left border-right p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3 text-center">{{ $prod->pname }}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>{{$prod->price}} ₹</h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="ml-3 text-left" style="display: inline-block">{{$prod->cname}}</div>
                                    <div class="ml-3 text-center" style="display: inline-block">{{$prod->stock}}</div>
                                    <div class="mr-3 text-right">{{ $prod->sname }}</div>
                                </div>
                                
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="{{ route('viewproduct',$prod->pid) }}" title="view : {{ $prod->pname  }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href={{ route('addtocart',$prod->pid) }}"" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>    
                @endforeach  
            </div>
        </div>
    <!-- Products End -->
    <div class="container-fluid pt-2" id="products">
        <div class="text-center mb-4">
            {{ $product->appends(\Request::except('page'))->render() }}
        </div>
    </div>
    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="/../img/vendor-1.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="/../img/vendor-2.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="/../img/vendor-3.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="/../img/vendor-4.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="/../img/vendor-5.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="/../img/vendor-6.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="/../img/vendor-7.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="/../img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


@endsection