@extends('app')

@section('content')
<h1>users</h1><h3 style="margin-top: 22px;margin-left:655px;"> Add users</h3>

<div class="col-xl-6" style="margin-left: 333px;">             

    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Default Layout</h5>
        <p class="mb-25"></p>
        <div class="row">
            <div class="col-sm">
 <form action="{{ route('dashboard.users.store')}}" method="post" enctype="multipart/form-data">
@csrf
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="firstName">name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                        </div>
                        <input type="text" name="name" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                            </div></div>
                            @error('name')
                        <span>{{$message}}</span>
                        @enderror

                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="firstName">email</label>
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

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="firstName">password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                                </div>
                                <input type="text" name="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>
                                    </div></div>
                                    @error('password')
                                    <span>{{$message}}</span>
                                    @enderror

                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="firstName">rule</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                                    </div>
                                    <input type="text" name="rule" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>
                                        </div></div>
                                        @error('rule')
                                        <span>{{$message}}</span>
                                        @enderror
{{-- multi lang content and title --}}

          
       
        
									

                 
                    <hr>
                    <button class="btn btn-primary" type="submit">Continue to checkout</button>
                </form>
            </div>
        </div>
    </section>
  
    
</div>



@endsection