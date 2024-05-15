@extends('app')

@section('content')
<h1>settings</h1><h3 style="margin-top: 22px;margin-left:655px;"> edit settings</h3>

<div class="col-xl-6" style="margin-left: 333px;">             

    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Default Layout</h5>
        <p class="mb-25"></p>
        <div class="row">
            <div class="col-sm">
 <form action="{{ route('dashboard.settings.update',$setting->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="firstName">Logo</label>
                            <img src="{{  $setting->logo }}" width="77px" height="77">
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                       

                        <div class="form-control text-truncate" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                        <span class="input-group-append">
         <span class=" btn btn-primary btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span>
             <input type="file" name="logo">
                        </span>
             <a href="#" class="btn btn-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </span>
                    </div>
                        </div>
                    </div>
                    @error('logo')
                    <span class="alert alert-danger">{{$message}}</span>
                    @enderror

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="firstName">favicon</label>
                            <img src="{{  $setting->favicon }}" width="77px" height="77">

                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="form-control text-truncate" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                        <span class="input-group-append">
                                <span class=" btn btn-primary btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span>
                        <input type="file" name="favicon">
                        </span>
                        <a href="#" class="btn btn-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </span>
                    </div>
                        </div></div>
                        @error('favicon')
                        <span class="alert alert-danger">{{$message}}</span>
                        @enderror

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="firstName">Facebook</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                        </div>
                        <input type="text" name="facebook" value="{{ old('facebook',$setting->facebook)}}" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                            </div></div>
                            @error('facebook')
                        <span class="alert alert-danger">{{$message}}</span>
                        @enderror

                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="firstName">linkedin</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                            </div>
                            <input type="text" name="linkedin"  value="{{ ($setting->linkedin)}}" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                                </div></div>
                                @error('linkedin')
                        <span class="alert alert-danger">{{$message}}</span>
                        @enderror

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="firstName">Phone</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                                </div>
                                <input type="text" name="phone"  value="{{($setting->phone)}}" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>
                                    </div></div>
                                    @error('phone')
                                    <span class="alert alert-danger">{{$message}}</span>
                                    @enderror

                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="firstName">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                                    </div>
                                    <input type="text" name="email"  value="{{($setting->email)}}" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>
                                        </div></div>
                                        @error('email')
                                        <span class="alert alert-danger">{{$message}}</span>
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
   $translations= $setting->getTranslationsArray()[$localeCode];
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
    <input type="text" value="{{ $translations['title'] }}" name="{{$localeCode}}[title]" class="form-control" aria-label="Default"
     aria-describedby="inputGroup-sizing-default">
</div>
        </div></div>
        @error("{{$localeCode}}[title]")
        <span class="alert alert-danger">{{$message}}</span>
        @enderror
      
        <textarea class="form-control mt-15" name="{{$localeCode}}[content]" rows="3" 
        >{{old($translations['content'],$translations['content'])}}"</textarea>
        @error("{{$localeCode}}[content]")
        <span class="alert alert-danger">{{$message}}</span>
        @enderror   
    </div>
       
        
									</div>
                                    @endforeach

								
								</div>
							</div>


                 
                    <hr>
                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
            </div>
        </div>
    </section>
  
    
</div>



@endsection