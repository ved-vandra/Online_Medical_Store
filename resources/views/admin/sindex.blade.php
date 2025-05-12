@extends('layouts.main')

@section('content')
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
    <h1 align="center">SUB-CATEGORY DETAILS</h1>
    {{-- <nav>
        <ul class="navbar nav ml-auto"> <label for="search" style="display:inline-block;" class="mr-2 mt-1 ml-auto"> SEARCH: </label>
        <input type="text" class="form-control"  style="width:200px;display:inline-block;" name="search" value="" id="search"></ul>
    </nav> --}}
</div>
<div id="pappu">
<table class="table table-striped">
    <tr>
        <td colspan="7">
            <a href="{{ route('savesubcategoryshow') }}" class="btn bg-gradient-success float-right">INSERT</a>
        </td>
    </tr>
    <tr  align="center">
        <th>@sortablelink('sid')</th>
        <th>@sortablelink('sub-categpry name')</th>
        <th>@sortablelink('category name')</th>
        <th>@sortablelink('sub-category description')</th>
        <th colspan="2">@sortablelink('Actions')</td>
    </tr>
    <tbody class="opp">
    @foreach($all as $data)
        <tr align="center">
            <td>{{ $data->sid}}</td>    
            <td>{{ $data->sname}}</td>
            <td>
                {{$data->cname}}
            </td>
            <td>{{ $data->sdesc}}</td>
            <td width="15%">
                <a href="{{ route('editsubcategoryshow',$data->sid) }}"><button type="button" class="btn bg-gradient-info">EDIT</button></a>&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;<form style="display:inline-block" action="{{ route('sdelete',$data->sid) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn bg-gradient-danger">DELETE</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
    
</table>
<div class="text-center" >
{{ $all->appends(\Request::except('page'))->render() }}
</div>
</div>

@endsection
