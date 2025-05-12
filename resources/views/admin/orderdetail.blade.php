@extends('layouts.main')

@section('content')
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
        <div class="header bg-secondary text-dark col-md-12 py-3 px-xl-4  text-center">
            <h2>Order Of {{ $order->fname }} {{ $order->lname }} from({{$order->city}},{{ $order->country }} )</h2>
        </div>
        <div class="row">
            <div class="col-md-6 mt-1 px-4 py-4 ">
                <div class="bg-primary text-dark text-center py-2"><h4>Order Details</h4></div>
                <table  align="center" id="tblorder"  class="table table-striped pt-3 px-xl-3" >
                    <thead style="height: 50px; font-size: 22px;" class="bg-secondary text-dark">
                        <th>
                            field
                        </th>
                        <th>value</th>
                    </thead>
                    <tr>
                        <td>First Name</td><td>{{ $order->fname }}</td>
                    </tr> 
                    <tr>
                        <td> Last Name</td><td>{{ $order->lname }}</td>
                    </tr>
                    <tr>
                        <td> E-Mail</td><td>{{ $order->email }}</td>
                    </tr>
                    <tr>
                        <td> Phone Number</td><td>{{ $order->phone }}</td>
                    </tr>
                    <tr>
                        <td> Address</td><td id="tdorder">{{ $order->address }}</td>
                    </tr>
                    <tr>
                        <td> City</td><td>{{ $order->city }}</td>
                    </tr>
                    <tr>
                        <td> Zip Code</td><td>{{ $order->zip }}</td>
                    </tr>
                    <tr>
                        <td> Countrys</td><td>{{ $order->country }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6 mt-1 px-4 py-4 ">
                <div class="bg-primary text-dark text-center py-2"><h4>Product Details</h4></div>
                <table  align="center" style="width: 100%;" class="table table-striped table-dark pt-3 px-xl-3" >
                    <thead style="height: 50px;font-size:22px;" class="bg-secondary text-dark">
                        <th>Product Name</th>
                        <th>Product ID</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>
                                {{ $item->pname }}
                            </td>
                            <td>{{ $item->pid }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td align="center">
                                <a class="btn btn-sm btn-outline-info" href="{{ route('viewproduct',$item->pid) }}" ><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-11 text-right">
                <form style="display: inline-block" action="{{ route('orderdelete',$order->order_id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn rounded btn-lg btn-outline-danger">Delete order</button>
                </form>
            </div>
        </div>
    </div>
@endsection