@extends('layouts.app')

@section('content')
@if(session('danger'))
        <div class="alert alert-danger alert-dismissible fade-show ml-5 mr-5" role="alert">
            {{ session('danger') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary  mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('home') }}">Home</a></p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    

    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php $totalqty = 0;$totalprice=0; ?>
                        @if (session('cart'))
                        {{-- @dd(session('cart')) --}}
                            @foreach(session('cart') as $id =>$product)
                                <?php $totalqty += $product['quantity']?>
                                {{-- @dd($product['price']); --}}
                                <?php $totalprice += $product['price']*$product['quantity']?>
                                <tr>
                                    <td class="align-middle">
                                        @foreach ($product['images'] as $image)
                                            <img src="uploads/{{ $image->iname }}" alt="" style="width: 50px; height:70px;">
                                        @endforeach {{ $product['pname']}}</td>
                                    <td class="align-middle" >{{ $product['price']}} </td>
                                    <td class="align-middle" align="center">
                                        <input type="number" data-id="{{$id}}" id="quantity" value="{{ $product['quantity'] }}" style="width: 90px" class="form-control quantity" />
                                        {{-- <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn quan"data-id="{{$id}}">
                                                <button class="btn btn-sm btn-primary btn-minus" >
                                                <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control form-control-sm bg-secondary text-center quantity" value="{{$product['quantity']}}">
                                            <div class="input-group-btn quan "data-id="{{$id}}">
                                                <button class="btn btn-sm btn-primary btn-plus">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div> --}}
                                    </td>
                                    <td class="align-middle">{{ $product['price']*$product['quantity'] }}</td>
                                    <td class="align-middle">
                                        <a class="btn btn-sm btn-info" href="{{ route('viewproduct',$id) }}" ><i class="fa fa-eye"></i></a>
                                        <button class="btn btnclose btn-sm btn-danger remove-from-cart" data-id="{{ $id }}" ><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot class="bg-secondary text-dark">
                        <td > <strong>TOTAL</strong></td>
                        <td></td>
                        <td > {{ $totalqty }} </td>
                        <td> {{ $totalprice }} </td>
                        <td align="center" style=""><a href="{{ route('shop') }}"  class="btn btn-block btn-warning rounded w-50 p-2 ml-0" > add more</a></td>
                    </tfoot>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">SUBTOTAL</h6>
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
                            <h5 class="font-weight-bold">{{$totalprice +$totalafter }}</h5>
                        </div>
                        @if (session('user'))
                            <form action="{{ route('placeorder') }}" method="POST">
                                @csrf
                                <button class="btn btn-block btn-primary my-3 py-3" >Place Order</button>
                            </form>
                        @else
                            <a class="btn btn-block btn-primary my-3 py-3" href="{{ route('checkout') }}">Proceed To Checkout</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection