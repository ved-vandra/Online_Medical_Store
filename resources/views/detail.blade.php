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
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5" style="text-align: center">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        @foreach ($img as $key=>$image)
                            <div class="carousel-item  @if($key == 0) active @endif">
                                <img class=" img-fluid " style=" height: 50vh; width:75%;" 
                                {{-- @if (Route::is('viewproduct')) --}}
                                    src="public/../../uploads/{{ $image->iname }}"
                                {{-- @else
                                    src="public/../uploads/{{ $image->iname }}"
                                @endif --}}
                                    alt="Image">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{ $product->pname }}</h3>
                <h3 class="font-weight-semi-bold mt-3 mb-4">{{ $product->price }} ₹</h3>
                <h3 class="font-weight-semi-bold mt-3 mb-4">Stock : {{ $product->stock }}</h3>
                
                <div class="d-flex align-items-center mb-4 pt-2">
                    
                    <a class="btn btn-primary px-3" href="{{ route('addtocart',$product->pid) }}"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</a>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
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
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection