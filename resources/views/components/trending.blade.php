<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
            @foreach($newsTrending as $one)
            <div class="item px-2">
                <div class="fh5co_hover_news_img">
                    <div class="fh5co_news_img"><img src="{{asset('images/39-324x235.jpg')}}" alt="img"/></div>
                    <div>
                        <a href="{{ route('news.show' , ['categoryid' => $one->idCategory, 'id' => $one->id]) }}" class="d-block fh5co_small_post_heading"><span class="">{{$one->title}}</span></a>
                        <div class="c_g"><i class="fa fa-clock-o"></i> {{$one->created_at}}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
