@extends('layouts.usersview')

@section('content')

    <div class="container-fluid bg-secondary  mb-3">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Your Orders</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('home') }}">Home</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-12 text-center mt-1 px-4 py-4 ">
        <div class="bg-primary text-dark py-3" ><h2>Product Details</h2></div>
        <table  align="center"  class="table table-striped table-dark pt-1 px-xl-3" >
            <thead style="height: 50px;font-size:22px;" class="bg-secondary text-dark">
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Order on Date</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                <tr>
                    <td>{{ $item->pname }}</td>
                    <td> {{ $item->price }} </td>
                    <td>{{ $item->quantity }}</td>
                    <td> {{ date('d M Y',strtotime($item->created_at)) }} </td>
                    <td>
                        <a class="btn btn-sm btn-outline-info" href="{{ route('viewproduct',$item->pid) }}" ><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection