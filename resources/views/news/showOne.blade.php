@extends('layouts.main')
@section('content')

<div id="fh5co-title-box" style="background-image: url({{asset('images/onestory.jpg')}}); background-position: 50% 90.5px;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="page-title">
        <img src="{{asset('images/person_1.jpg')}}" alt="Free HTML5 by FreeHTMl5.co">
        <span>{{$news->created_at}}</span>
        <h2>{{$news->title}}</h2>
    </div>
</div>
<div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                {!! $news->body !!}
            </div>
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                </div>
                <div class="clearfix"></div>
                @include('partials.tags', ['tags' => $tags])
                @include('partials.mostPopular' , ['mostPopular' => $mostPopular])
            </div>
        </div>
    </div>
</div>
@include('partials.trending', ['trending' => $trending, 'singlePage' => $singlePage])
@stop

@section('scripts')
    <!-- Parallax -->
    <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
    <script>if (!navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i)){$(window).stellar();}</script>

@stop
