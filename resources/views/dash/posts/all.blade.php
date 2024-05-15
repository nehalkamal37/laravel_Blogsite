@extends('app')
@push('custom-css')
<link href="https://cdn.datatables.net/v/bs4/dt-2.0.5/datatables.min.css" rel="stylesheet">
 
@endpush
@push('custom-js')
 
<script src="https://cdn.datatables.net/v/bs4/dt-2.0.5/datatables.min.js"></script>
<script>
let table = new DataTable('#postsTable');
</script>
@endpush

@section('content')
<h1>posts</h1><h3 style="margin-top: 22px;margin-left:655px;">posts</h3>

<div class="card col-12"  style="width: 1611px;margin-left:22px;">
    <div class="card-body pa-0">
        <div class="table-wrap">
            <a href="{{ route('dashboard.posts.create')}}" class="btn btn-info" style="margin-top: 22px;margin-left:655px;">add new</a>

            <div class="table-responsive">
                <table   id="postsTable" class="table table-hover mb-0">
                    <thead>
                        <tr>
                          
                         <th>#</th>
                         <th>image</th>
                         <th>auther</th>
                         <th>category</th>
                         @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <th>title {{$localeCode}} </th>
                            <th>content {{$localeCode}}</th>
                            <th>small description {{$localeCode}}</th>
                            <th>tags {{$localeCode}}</th>

@endforeach
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $post)
                           
                     
                        <tr>
                            <td>{{ $loop->index +1}}</td>
                         @foreach ($post->media as $img)
                            <td> <img src="{{ $img->getUrl() }}" width="77" height="77" ></td>
                                       @endforeach  
{{--
                                     
<td><img width="77" height="77" 
    src="{{ $post->getMedia('post_image')->first()->getUrl('old_picture')}}"></td> 
    --}}                    
    
    <td>{{ $post->user->name ?? ''}}</td>
    <td>{{ $post->category->title ?? ''}}</td>
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                          @php
     $translations=$post->getTranslationsArray()[$localeCode];   

                          @endphp
                        
                            <td>{{ $translations['title']}}</td>
                            <td>{!! $translations['content'] !!}</td>
                            
                            <td>{!! $translations['small_description'] !!}</td>
                            @php
                             $finaltags=explode(',',$translations['tags'] );
                            @endphp
                            <td>
                                @foreach($finaltags as $tag)
           <span class="badge badge-success badge-pill mt-15 mr-10">  {{ $tag }}</span>
                            @endforeach
                            </td>

                           @endforeach

                           @if($post->deleted_at)

                       <td>    
   <a href="{{route('dashboard.posts.restore',$post->id)}}" class="btn btn-icon btn-secondary btn-icon-style-1">
         <span class="btn-icon-wrap"><i class="icon-settings"></i></span></a>
                                
    <a href="{{route('dashboard.posts.erase',$post->id)}}" class="btn btn-icon btn-danger btn-icon-style-1">
        <span class="btn-icon-wrap"><i class="fa fa-trash"></i></span></a>
                       </td>
                            @else
<td>    
    <a href="{{route('dashboard.posts.edit',$post->id)}}" class="btn btn-icon btn-secondary btn-icon-style-1">
    <span class="btn-icon-wrap"><i class="fa fa-pencil"></i></span></a>

    <button type="button" class="btn btn-warning p-3" data-toggle="modal"
     data-target="#exampleModalCenter{{$post->id}}">
        <span class="btn-icon-wrap"><i class="fa fa-trash"></i></span>
    </button>
    </td>

</form>

   

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter{{$post->id}}" tabindex="-1" 
        role="dialog" aria-labelledby="exampleModalCenter{{$post->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Make sure you want to delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>post {{$post->translate('en')->title}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="{{ route('dashboard.posts.destroy',$post->id)}}" method="POST">
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