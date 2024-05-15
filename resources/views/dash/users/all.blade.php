@extends('app')
@push('custom-css')
<link href="https://cdn.datatables.net/v/bs4/dt-2.0.5/datatables.min.css" rel="stylesheet">
 
@endpush
@push('custom-js')
 
<script src="https://cdn.datatables.net/v/bs4/dt-2.0.5/datatables.min.js"></script>
<script>
let table = new DataTable('#usersTable');
</script>
@endpush

@section('content')
<h1>users</h1><h3 style="margin-top: 22px;margin-left:655px;">users</h3>

<div class="card col-12">
    <div class="card-body pa-0">
        <div class="table-wrap">
            <a href="{{ route('dashboard.users.create')}}" class="btn btn-info" style="margin-top: 22px;margin-left:655px;">add new</a>

            <div class="table-responsive">
                <table style="width: 1000px;margin-left:244px;" id="usersTable" class="table table-hover mb-0">
                    <thead>
                        <tr>
                          
                         <th>#</th>
                            <th>name</th>
                            <th>email</th>
                            <th>role</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $user)
                           
                     
                        <tr>
                            <td>{{ $loop->index +1}}</td>
                      
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->role}}</td>
                            @if($user->deleted_at)

                       <td>    
                         <a href="{{route('dashboard.users.restore',$user->id)}}" class="btn btn-icon btn-secondary btn-icon-style-1">
                                <span class="btn-icon-wrap"><i class="icon-settings"></i></span></a>
                                
    <a href="{{route('dashboard.users.erase',$user->id)}}" class="btn btn-icon btn-danger btn-icon-style-1">
        <span class="btn-icon-wrap"><i class="fa fa-trash"></i></span></a>
                       </td>
                            @else
<td>    
    <a href="{{route('dashboard.users.edit',$user->id)}}" class="btn btn-icon btn-secondary btn-icon-style-1">
    <span class="btn-icon-wrap"><i class="fa fa-pencil"></i></span></a>



    <button type="button" class="btn btn-warning p-3" data-toggle="modal"
     data-target="#exampleModalCenter{{$user->id}}">
        <span class="btn-icon-wrap"><i class="fa fa-trash"></i></span>
    </button>
    </td>

</form>

   

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter{{$user->id}}" tabindex="-1" 
        role="dialog" aria-labelledby="exampleModalCenter{{$user->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Make sure you want to delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>User {{$user->name}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="{{ route('dashboard.users.destroy',$user->id)}}" method="POST">
                        @csrf
                        @method('delete') 
                    <button  class="btn btn-danger">delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endif
                        </tr>
                       
                         
                           
                       
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection