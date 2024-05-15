@extends('app')

@section('content')
<h1>settings</h1><h3 style="margin-top: 22px;margin-left:655px;">settings</h3>

<div class="card col-12">
    <div class="card-body pa-0">
        <div class="table-wrap">
            <a href="{{ route('dashboard.settings.create')}}" class="btn btn-info" style="margin-top: 22px;margin-left:655px;">add new</a>

            <div class="table-responsive">
                <table style="width: 1000px;margin-left:244px;" class="table table-hover mb-0">
                    <thead>
                        <tr>
                          
                         <th>#</th>
                            <th>logo</th>
                            <th>Favicon</th>
                            <th>facebook</th>
                            <th>phone</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $setting)
                           
                     
                        <tr>
                            <td>{{ $loop->index +1}}</td>
                            @foreach ($setting->media as $img)
                 <td> <img src="{{ $img->getUrl() }}" width="77" height="77" ></td>
                            @endforeach

                            <td>{{ $setting->facebook}}</td>
                            <td>{{ $setting->phone}}</td>
<td>          <a href="{{route('dashboard.settings.edit',$setting->id)}}" class="btn btn-icon btn-secondary btn-icon-style-1">
    <span class="btn-icon-wrap"><i class="fa fa-pencil"></i></span></a>
</td>

<form action="{{ route('dashboard.settings.destroy',$setting->id)}}" method="POST">
    @csrf
    @method('delete')
    <td><button class="btn btn-icon btn-info btn-icon-style-1">
        <span class="btn-icon-wrap"><i class="icon-trash"></i></span></button></td>
</form>

                            
                        </tr>
                       
                         
                           
                       
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection