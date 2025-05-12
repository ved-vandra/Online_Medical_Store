@extends('layouts.main')

@section('content')
@if(session('update'))
<div class="alert alert-info alert-dismissible fade-show ml-5 mr-5" role="alert">
    {{ session('update') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@endsection