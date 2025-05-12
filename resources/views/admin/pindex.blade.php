@extends('layouts.main')

@section('content')
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade-show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session('update'))
    <div class="alert alert-info alert-dismissible fade-show" role="alert">
        {{ session('update') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="abc">
    <h1 align="center">PRODUCT DETAILS</h1>
    {{-- <nav>
        <ul class="navbar nav ml-auto"> <label for="search" style="display:inline-block;" class="mr-2 mt-1 ml-auto"> SEARCH: </label>
        <input type="text" class="form-control"  style="width:200px;display:inline-block;" name="psearch" id="psearch"></ul>
    </nav> --}}
</div>
<div id="poi">
<table class="table table-striped">
    <tr>
        <td colspan="12">
            <a href="{{ route('saveproductshow') }}" class="btn bg-gradient-success float-right">INSERT</a>
        </td>
    </tr>
    <tr  align="center">
        <th>@sortablelink('Product ID')</td>
        <th>@sortablelink('SKU')</td>
        <th>@sortablelink('category name')</td>
        <th>@sortablelink('sub-category name')</td>
        <th>@sortablelink('product name')</td>
        <th>@sortablelink('Price')</td>
        <th>@sortablelink('Quantity')</td>
        <th>@sortablelink('Stock Status')</td>
        <th>@sortablelink('Images')</td>
        <th colspan="2">@sortablelink('Actions')</td>
    </tr>
    @foreach($all as $data)
        <tr align="center">
            <td width="7%">{{ $data->pid}}</td>    
            <td width="10%">{{ $data->sku}}</td>     
            <td width="11%">{{ $data->cname }}</td>
            <td width="11%">{{ $data->sname }}</td>  
            <td width="10%">{{ $data->pname}}</td>  
            <td width="10%">{{ $data->price}}</td>    
            <td width="10%">{{ $data->quan}}</td>    
            <td width="10%">{{ $data->stock}}</td>
            <td width="10%">
                @foreach ($data->iname as $image)
                    <a class="imglink" href="{{ route('imgdel',$image->iid) }}">
                        <img class="img" style="display:inline-block" height="36px" width="36px" src="public/../../uploads/{{$image->iname}}" alt="">
                        <span class="imgspan"><i class="fas fa-times"></i></span>
                    </a>
                @endforeach
            </td>
            <td width="11%">
                <a href="{{ route('editproductshow',$data->pid) }}"><button type="button" class="btn bg-gradient-info">EDIT</button></a>&nbsp;&nbsp;
                <form style="display:inline-block" action="{{ route('pdelete',$data->pid) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn bg-gradient-danger">DELETE</button>
                </form>
            </td>
        </tr>
    @endforeach
    
</table>
<div class="text-center">
{{ $all->appends(\Request::except('page'))->render() }}
</div>
</div>
@endsection