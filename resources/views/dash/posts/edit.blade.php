@extends('app')
@push('custom-css')
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
@endpush

@push('custom-js')
<script>
    let alltexts=document.querySelectorAll('.ck-edit');
    alltexts.forEach(element => {
        ClassicEditor
        .create( element )
        .catch( error => {
            console.error( error );
        } );
    });
  
</script>

@endpush
@section('content')
<h1>posts</h1><h3 style="margin-top: 22px;margin-left:655px;"> Add posts</h3>

<div class="col-xl-6" style="margin-left: 333px;">             

    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Default Layout</h5>
        <p class="mb-25"></p>
        <div class="row">
            <div class="col-sm">
 <form action="{{ route('dashboard.posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="firstName">image</label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
 <div class="form-control text-truncate" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                        <span class="input-group-append">
         <span class=" btn btn-primary btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span>
                        <input type="file" name="image">
                        </span>
             <a href="#" class="btn btn-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </span>
                    </div>
                        </div>
                    </div>
                    @error('image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                  
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="firstName">parent_post</label>

                                <select name="category_id" class="form-control custom-select form-control custom-select-lg mt-15">
                                    @foreach($categories as $cat)
        <option @selected($post->category_id == $cat->id) value="{{ $cat->id}}">{{$cat->getTranslationsArray()['en']['title']}}</option>
                                 @endforeach
                                </select>
                   
                            </div></div>
                            @error('category_id')
                        <span>{{$message}}</span>
                        @enderror

                        
{{-- multi lang content and title --}}

                                       <div class="card hk-dash-type-1 overflow-hide">
							<div class="card-header pa-0">
		<div class="nav nav-tabs nav-light nav-justified" id="dash-tab" role="tablist">
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode=>$properties)
                
            
	<a class="d-flex align-items-center justify-content-center nav-item nav-link
     {{$loop->index == 0 ?'active':''}}" 
    id="dash-tab-{{$localeCode}}" data-toggle="tab" href="#nav-dash-{{$localeCode}}" role="tab" aria-selected="true">			
    <div class="d-flex">
											<div>
				<span class="d-block mb-5"><span class="display-4 ">{{ $properties['native']}}</span></span>
								<span class="d-block"><i class="zmdi zmdi-eye mr-10"></i>{{$localeCode}}</span>
											</div>
										</div>
									</a>
								@endforeach
								</div>
							</div>
							<div class="card-body">
								<div class="tab-content" id="nav-tabContent">
        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode=>$properties)
        @php
   $translations= $post->getTranslationsArray()[$localeCode];
  // dd($localeCode['title']);
@endphp
		<div class="tab-pane fade {{$loop->index == 0 ?'active':''}}"
             id="nav-dash-{{ $localeCode}}" role="tabpanel" aria-labelledby="dash-tab-{{ $localeCode}}">
		<div id="e_chart_{{ $localeCode}}" class="echart" style="height: 310px;
         user-select: none; position:
         relative;" _echarts_instance_="ec_1713616779972">
        
       <div></div>
        
       <div class="row">
        <div class="col-md-12 form-group">
            <label for="firstName">title</label>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">title {{$localeCode}}</span>
    </div>
    <input type="text" name="{{$localeCode}}[title]" value="{{ old($translations['title'],$translations['title']) }}" class="form-control" aria-label="Default"
     aria-describedby="inputGroup-sizing-default">
</div>
        </div></div>
        @error("{{$localeCode}}[title]")
        <span class="alert alert-danger">{{$message}}</span>
        @enderror
      
        <textarea class="form-control mt-15 ck-edit"  placeholder="content..." 
        name="{{$localeCode}}[content]" rows="3" >{{ old($translations['content'],$translations['content']) }}</textarea>
        @error("{{$localeCode}}[content]")
        <span>{{$message}}</span>
        @enderror   
        </div>
<div>
    <textarea class="form-control mt-15 ck-edit" placeholder="small description"
     name="{{$localeCode}}[small_description]" rows="3" >{{ old($translations['small_description'],$translations['small_description']) }}</textarea>
    @error("{{$localeCode}}[small_description]")
    <span>{{$message}}</span>
    @enderror   
</div>
<div>
    <textarea class="form-control mt-15 " placeholder="tags..." 
    name="{{$localeCode}}[tags]" rows="3" >{{ old($translations['tags'],$translations['tags']) }}</textarea>
    @error("{{$localeCode}}[tags]")
    <span>{{$message}}</span>
    @enderror   
</div>
    

									</div>
                                    @endforeach

								<!--	<div class="tab-pane fade" id="nav-dash-2" role="tabpanel" aria-labelledby="dash-tab-2">
										<div id="e_chart_12" class="echart" style="height: 310px; user-select: none; position: relative;" _echarts_instance_="ec_1713616779973"><div style="position: relative; overflow: hidden; width: 0px; height: 310px; padding: 0px; margin: 0px; border-width: 0px;"><canvas style="position: absolute; left: 0px; top: 0px; width: 0px; height: 310px; user-select: none; padding: 0px; margin: 0px; border-width: 0px;" data-zr-dom-id="zr_0" width="0" height="310"></canvas></div><div></div></div>
									</div>
									<div class="tab-pane fade" id="nav-dash-3" role="tabpanel" aria-labelledby="dash-tab-3">
										<div id="e_chart_13" class="echart" style="height: 310px; user-select: none; position: relative;" _echarts_instance_="ec_1713616779974"><div style="position: relative; overflow: hidden; width: 0px; height: 310px; padding: 0px; margin: 0px; border-width: 0px;"><canvas style="position: absolute; left: 0px; top: 0px; width: 0px; height: 310px; user-select: none; padding: 0px; margin: 0px; border-width: 0px;" data-zr-dom-id="zr_0" width="0" height="310"></canvas></div><div></div></div>
									</div>-->
								</div>
							</div>


                 
                    <hr>
                    <button class="btn btn-primary" type="submit">Continue to update</button>
                </form>
            </div>
        </div>
    </section>
  
    
</div>



@endsection