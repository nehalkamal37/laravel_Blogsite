@extends('welcome')
@section('title',$setting->translate(LaravelLocalization::getCurrentLocale())->title)
@section('content')
<section class="section first-section">
    <div class="container-fluid">
        <div class="masonry-blog clearfix">
            @foreach($categories as $cat)
            <div class="left-side">
                <div class="masonry-box post-media">
                     <img src="{{ $cat->cat_image}}" alt="" class="img-fluid">
                     <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                <span class="bg-aqua"><a href="blog-category-01.html" title="">
                    {{$cat->translate(LaravelLocalization::getCurrentLocale())->title}}</a></span>
                                <h4><a href="garden-single.html" title="">{{$cat->translate(LaravelLocalization::getCurrentLocale())->content}}</a></h4>
                                <small><a href="garden-single.html" title="">{{$cat->created_at->format('M. Y, j:s')}}</a></small>
                                <small><a href="#" title="">by Amanda</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end left-side -->

            @endforeach
            <div class="center-side">
                <div class="masonry-box post-media">
                     <img src="upload/garden_cat_02.jpg" alt="" class="img-fluid">
                     <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-aqua"><a href="blog-category-01.html" title="">Outdoor</a></span>
                                <h4><a href="garden-single.html" title="">You can create a garden with furniture in your home</a></h4>
                                <small><a href="garden-single.html" title="">19 July, 2017</a></small>
                                <small><a href="#" title="">by Amanda</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end left-side -->

            <div class="right-side hidden-md-down">
                <div class="masonry-box post-media">
                     <img src="upload/garden_cat_03.jpg" alt="" class="img-fluid">
                     <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-aqua"><a href="blog-category-01.html" title="">Indoor</a></span>
                                <h4><a href="garden-single.html" title="">The success of the 10 companies in the vegetable sector</a></h4>
                                <small><a href="garden-single.html" title="">03 July, 2017</a></small>
                                <small><a href="#" title="">by Jessica</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                     </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end right-side -->
        </div><!-- end masonry -->
    </div>
</section>

<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-list clearfix">

@foreach($posts as $post)
                        <hr class="invis">

                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="garden-single.html" title="">
                                        <img src="{{$post->image}}" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->

                            <div class="blog-meta big-meta col-md-8">
<span class="bg-aqua"><a href="garden-category.html" title="">
    {{$post->translate(LaravelLocalization::getCurrentLocale())->title}}</a></span>
                                <h4><a href="garden-single.html" title="">
                                    {{$post->translate(LaravelLocalization::getCurrentLocale())->small_description}}< </a></h4>
                                <p>{{$post->translate(LaravelLocalization::getCurrentLocale())->content}}<</p>
                                <small><a href="garden-category.html" title=""><i class="fa fa-eye"></i> 4441</a></small>
                                <small><a href="garden-single.html" title="">{{$post->created_at->format('M. Y, j:s')}}</a></small>
                                <small><a href="#" title="">by Matilda</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->
@endforeach
                        
                      

                    </div><!-- end blog-list -->
                </div><!-- end page-wrapper -->

                <hr class="invis">

                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-start">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="widget">
                        <h2 class="widget-title">Search</h2>
                        <form class="form-inline search-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search on the site">
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </form>
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title">Recent Posts</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                <a href="garden-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="upload/garden_sq_09.jpg" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">5 Beautiful buildings you need to before dying</h5>
                                        <small>12 Jan, 2016</small>
                                    </div>
                                </a>

                                <a href="garden-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="upload/garden_sq_06.jpg" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">Let's make an introduction for creative life</h5>
                                        <small>11 Jan, 2016</small>
                                    </div>
                                </a>

                                <a href="garden-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 last-item justify-content-between">
                                        <img src="upload/garden_sq_02.jpg" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">Did you see the most beautiful sea in the world?</h5>
                                        <small>07 Jan, 2016</small>
                                    </div>
                                </a>
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title">Advertising</h2>
                        <div class="banner-spot clearfix">
                            <div class="banner-img">
                                <img src="upload/banner_04.jpg" alt="" class="img-fluid">
                            </div><!-- end banner-img -->
                        </div><!-- end banner -->
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title">Instagram Feed</h2>
                        <div class="instagram-wrapper clearfix">
                            <a href="#"><img src="upload/garden_sq_01.jpg" alt="" class="img-fluid"></a>
                            <a href="#"><img src="upload/garden_sq_02.jpg" alt="" class="img-fluid"></a>
                            <a href="#"><img src="upload/garden_sq_03.jpg" alt="" class="img-fluid"></a>
                            <a href="#"><img src="upload/garden_sq_04.jpg" alt="" class="img-fluid"></a>
                            <a href="#"><img src="upload/garden_sq_05.jpg" alt="" class="img-fluid"></a>
                            <a href="#"><img src="upload/garden_sq_06.jpg" alt="" class="img-fluid"></a>
                            <a href="#"><img src="upload/garden_sq_07.jpg" alt="" class="img-fluid"></a>
                            <a href="#"><img src="upload/garden_sq_08.jpg" alt="" class="img-fluid"></a>
                            <a href="#"><img src="upload/garden_sq_09.jpg" alt="" class="img-fluid"></a>
                        </div><!-- end Instagram wrapper -->
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title">Popular Categories</h2>
                        <div class="link-widget">
                            <ul>
                                <li><a href="#">Gardening <span>(21)</span></a></li>
                                <li><a href="#">Outdoor Living <span>(15)</span></a></li>
                                <li><a href="#">Indoor Living <span>(31)</span></a></li>
                                <li><a href="#">Shopping Guides <span>(22)</span></a></li>
                                <li><a href="#">Pool Design <span>(66)</span></a></li>
                            </ul>
                        </div><!-- end link-widget -->
                    </div><!-- end widget -->
                </div><!-- end sidebar -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

@endsection