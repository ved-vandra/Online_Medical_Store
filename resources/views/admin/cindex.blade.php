@extends('layouts.main')

@section('content')
<div class="main">
@if (session('mssg'))
    <div class="alert alert-success alert-dismissible fade-show" role="alert">
        {{ session('mssg') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
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
    <h1 align="center">CATEGORY DETAILS</h1>
    {{-- <nav>
        <ul class="navbar nav ml-auto"> <label for="search" style="display:inline-block;" class="mr-2 mt-1 ml-auto"> SEARCH: </label>
        <input type="text" class="form-control"  style="width:200px;display:inline-block;" name="search" id="csearch"></ul>
    </nav> --}}
</div>
<div id="poi">
<table class="table table-striped" width="100%">
    <tr>
        <td colspan="8">
            <a href="{{ route('savecategoryshow') }}" class="btn bg-gradient-success float-right" id="btninsert">INSERT</a>
        </td>
    </tr>
    <tr  align="center">
        
        <th>@sortablelink('Category ID')</td>
        <th>@sortablelink('Category Name')</td>
        <th>@sortablelink('Category Description')</td>
        <th colspan="2">@sortablelink('Actions')</td>
    </tr>
    @foreach($all as $data)
        <tr align="center">
            <td>{{ $data->cid}}</td>    
            <td>{{ $data->cname}}</td>
            <td>{{ $data->cdesc}}</td>
            <td width="20%">
                <a href="{{ route('editcategoryshow',$data->cid) }}"><button type="button" class="btn bg-gradient-info">EDIT</button></a>&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;<form style="display:inline-block" action="{{ route('cdelete',$data->cid) }}" method="POST">
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
</div>
@endsection