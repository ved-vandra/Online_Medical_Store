@extends('layouts.app')

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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>
                        WELCOME 
                    </h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('user'))
                           <b>User Name:</b> <?php echo session('user')['fname'];?></br>
                        @else

                        @endif
                        
                    {{ __('You are logged in!') }}<br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
