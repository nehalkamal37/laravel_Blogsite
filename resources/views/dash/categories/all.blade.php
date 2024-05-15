@extends('app')
@push('custom-css')
<link href="https://cdn.datatables.net/v/bs4/dt-2.0.5/datatables.min.css" rel="stylesheet">
 
@endpush
@push('custom-js')
 
<script src="https://cdn.datatables.net/v/bs4/dt-2.0.5/datatables.min.js"></script>
<script>
let table = new DataTable('#categoriesTable');
</script>
@endpush

@section('content')
<h1>categories</h1><h3 style="margin-top: 22px;margin-left:655px;">categories</h3>

<div class="card col-12">
    <div class="card-body pa-0">
        <div class="table-wrap">
            <a href="{{ route('dashboard.categories.create')}}" class="btn btn-info" style="margin-top: 22px;margin-left:655px;">add new</a>

            <div class="table-responsive">
                <table style="width: 1000px;margin-left:244px;" id="categoriesTable" class="table table-hover mb-0">
                    <thead>
                        <tr>
                          
                         <th>#</th>
                         <th>image</th>
                         @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <th>name {{$localeCode}} </th>
                            <th>content {{$localeCode}}</th>
@endforeach
                            <th>parent</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $category)
                           
                     
                        <tr>
                            <td>{{ $loop->index +1}}</td>
                         @foreach ($category->media as $img)
                            <td> <img src="{{ $img->getUrl() }}" width="77" height="77" ></td>
                                       @endforeach  
{{--
                                     
<td><img width="77" height="77" 
    src="{{ $category->getMedia('category_image')->first()->getUrl('old_picture')}}"></td> 
    --}}                    
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                          @php
     $translations=$category->getTranslationsArray()[$localeCode];   

                          @endphp
                        
                            <td>{{ $translations['title']}}</td>
                            <td>{{ $translations['content']}}</td>
                           @endforeach
                            <td>{{ $category->parentdata->title ?? 'main'}}</td>
                           @if($category->deleted_at)

                       <td>    
   <a href="{{route('dashboard.categories.restore',$category->id)}}" class="btn btn-icon btn-secondary btn-icon-style-1">
         <span class="btn-icon-wrap"><i class="icon-settings"></i></span></a>
                                
    <a href="{{route('dashboard.categories.erase',$category->id)}}" class="btn btn-icon btn-danger btn-icon-style-1">
        <span class="btn-icon-wrap"><i class="fa fa-trash"></i></span></a>
                       </td>
                            @else
<td>    
    <a href="{{route('dashboard.categories.edit',$category->id)}}" class="btn btn-icon btn-secondary btn-icon-style-1">
    <span class="btn-icon-wrap"><i class="fa fa-pencil"></i></span></a>

    <button type="button" class="btn btn-warning p-3" data-toggle="modal"
     data-target="#exampleModalCenter{{$category->id}}">
        <span class="btn-icon-wrap"><i class="fa fa-trash"></i></span>
    </button>
    </td>

</form>

   

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter{{$category->id}}" tabindex="-1" 
        role="dialog" aria-labelledby="exampleModalCenter{{$category->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Make sure you want to delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>category {{$category->name}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="{{ route('dashboard.categories.destroy',$category->id)}}" method="POST">
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