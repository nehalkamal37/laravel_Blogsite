@extends('app')

@section('content')
<h1>settings</h1><h3 style="margin-top: 22px;margin-left:655px;"> Add settings</h3>

<div class="col-xl-6" style="margin-left: 333px;">             

    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Default Layout</h5>
        <p class="mb-25"></p>
        <div class="row">
            <div class="col-sm">
 <form action="{{ route('dashboard.settings.store')}}" method="post" enctype="multipart/form-data">
@csrf
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="firstName">Logo</label>
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
                    <span>{{$message}}</span>
                    @enderror

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="firstName">favicon</label>
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
                        <span>{{$message}}</span>
                        @enderror

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="firstName">Facebook</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                        </div>
                        <input type="text" name="facebook" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                            </div></div>
                            @error('facebook')
                        <span>{{$message}}</span>
                        @enderror

                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="firstName">linkedin</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                            </div>
                            <input type="text" name="linkedin" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                                </div></div>
                                @error('linkedin')
                        <span>{{$message}}</span>
                        @enderror

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="firstName">Phone</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                                </div>
                                <input type="text" name="phone" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>
                                    </div></div>
                                    @error('phone')
                                    <span>{{$message}}</span>
                                    @enderror

                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="firstName">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                                    </div>
                                    <input type="text" name="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>
                                        </div></div>
                                        @error('email')
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
    <input type="text" name="{{$localeCode}}[title]" class="form-control" aria-label="Default"
     aria-describedby="inputGroup-sizing-default">
</div>
        </div></div>
        @error("{{$localeCode}}[title]")
        <span>{{$message}}</span>
        @enderror
      
        <textarea class="form-control mt-15" name="{{$localeCode}}[content]" rows="3" 
        placeholder="content..."></textarea>
        @error("{{$localeCode}}[content]")
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
                    <button class="btn btn-primary" type="submit">Continue to checkout</button>
                </form>
            </div>
        </div>
    </section>
  
    
</div>



@endsection