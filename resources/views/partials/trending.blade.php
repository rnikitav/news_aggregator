@if(isset($singlePage))
    <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2">
                @foreach($trending as $one)
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img"><img src="{{asset('images/39-324x235.jpg')}}" alt=""/></div>
                        <div>
                            <a href="{{ route ('news.show', ['categoryid' => $one->idCategory, 'id' => $one->id])}}"
                               class="d-block fh5co_small_post_heading">
                                <span class="">{{$one->title}}</span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> {{$one->created_at}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@else
<div class="container-fluid pt-3">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
        </div>
        <div class="owl-carousel owl-theme js" id="slider1">
            @foreach($trending as $one)
                <div class="item px-2">
                    <div class="fh5co_latest_trading_img_position_relative">
                        <div class="fh5co_latest_trading_img">
{{--                            <img src="{{asset('images')}}/{{$one['img']}}" alt=""--}}
{{--                                                                   class="fh5co_img_special_relative"/>--}}
                            <img src="http://placeimg.com/640/480/nature">" alt="img">
                        </div>
                        <div class="fh5co_latest_trading_img_position_absolute"></div>
                        <div class="fh5co_latest_trading_img_position_absolute_1">
                            <a href="{{ route ('news.show', ['categoryid' => $one->idCategory, 'id' => $one->id])}}" class="text-white"> {{$one->title}}</a>
                            <div class="fh5co_latest_trading_date_and_name_color"> Walter Johson - {{$one->created_at}}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif

