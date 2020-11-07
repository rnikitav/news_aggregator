<div>
    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
</div>
@foreach($mostPopular as $one)
<div class="row pb-3">
    <div class="col-5 align-self-center">
{{--        <img src="{{asset('/images')}}/{{$one->img}}" alt="img" class="fh5co_most_trading"/>--}}
        <img src="{{asset('/images')}}/science-578x362.jpg" alt="img" class="fh5co_most_trading"/>
    </div>
    <div class="col-7 paddding">
        <div class="most_fh5co_treding_font">
            <a class="mostPopularA" href="{{ route ('news.show', ['categoryid' => $one->idCategory, 'id' => $one->id])}}">{{$one->title}}</a>
        </div>
        <div class="most_fh5co_treding_font_123"> {{$one->created_at}}</div>
    </div>
</div>



@endforeach

