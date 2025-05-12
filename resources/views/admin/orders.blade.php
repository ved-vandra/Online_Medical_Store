@extends('layouts.main')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">   
    <div class="container-fluid pt-5">
        @if(session('error'))
            <div class="alert alert-info alert-dismissible fade-show ml-5 mr-5" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row px-xl-5">
            <div class="col-md-12">
            <table class="table table-bordered text-center mb-0 " id="orders">
                <thead class="bg-secondary text-dark">
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>E-Mail</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th> Actions </th>
                </thead>
                <tbody>
                    {{-- @foreach ($orders as $order)
                        <tr>

                            <td>{{ $order->fname }}</td>
                            <td>{{ $order->lname }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->country }}</td>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{ route('orderdetail',1) }}" ><i class="fa fa-eye"></i></a>
                                <form style="display: inline-block" action="{{ route('orderdelete',1) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                       </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function(){
            var table= $('#orders').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('vieworders') }}",
                columns: [
                    {data: 'fname', name: 'fname'},
                    {data: 'lname', name: 'lname'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'country', name: 'country' ,searchable:false},
                    {
                        data: 'action', 
                        name: 'action', 
                        orderable: true, 
                        searchable: true,
                    },
                ]
            });
        });
    </script>
@endsection