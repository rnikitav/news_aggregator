<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                @if(isset($category) && !empty($category))
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News Category {{$category->name}}</div>
                    </div>
                @else
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                    </div>
                @endif

                    @forelse($arrForNewsBlog as $one)
                            <div class="row pb-4">
                                <div class="col-md-5">
                                    <div class="fh5co_hover_news_img">
                                        <div class="fh5co_news_img">
                                            {{--                                        <img src="{{asset('images')}}/{{$arrForNewsBlog[$i]['img']}}" alt="photo"/>--}}
                                            <img src="http://placeimg.com/640/480/sepia">" alt="img">
                                        </div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <a href="{{ route('news.show' , ['categoryid' => $one->idCategory, 'id' => $one->id]) }}" class="fh5co_magna py-2"> {{$one->title}} </a>
                                    <a href="#" class="fh5co_mini_time py-3">
                                        Thomson Smith - 321321
                                        Thomson Smith - {{$one->created_at->format('F d,Y')}}
                                    </a>
                                    <div class="fh5co_consectetur"> Quis nostrud xercitation ullamco laboris nisi aliquip ex ea commodo
                                        consequat.
                                    </div>
                                </div>
                            </div>
                    @empty
                            <h2>Новостей в данной категории нет</h2>
                    @endforelse

                @if($paginateForPage)
                        {{$arrForNewsBlog->links()}}
                    @endif

                {{--                TODO Оставил два варианта для шаблона--}}
{{--                    <br><br><br>--}}
{{--                <h3>Ниже образец стлей для новостей</h3>--}}
{{--                    <br><br><br>--}}
{{--                    <div class="row pb-4">--}}
{{--                    <div class="col-md-5">--}}
{{--                        <div class="fh5co_hover_news_img">--}}
{{--                            <div class="fh5co_news_img"><img src="{{asset('images/nathan-mcbride-229637.jpg')}}" alt=""/></div>--}}
{{--                            <div></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-7 animate-box">--}}
{{--                        <a href="single.html" class="fh5co_magna py-2"> Magna aliqua ut enim ad minim veniam quis--}}
{{--                            nostrud quis xercitation ullamco. </a> <a href="#" class="fh5co_mini_time py-3"> Thomson Smith ---}}
{{--                            April 18,2016 </a>--}}
{{--                        <div class="fh5co_consectetur"> Amet consectetur adipisicing elit, sed do eiusmod tempor incididunt--}}
{{--                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row pb-4">--}}
{{--                    <div class="col-md-5">--}}
{{--                        <div class="fh5co_hover_news_img">--}}
{{--                            <div class="fh5co_news_img"><img src="{{asset('images/ryan-moreno-98837.jpg')}}" alt=""/></div>--}}
{{--                            <div></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-7">--}}
{{--                        <a href="#" class="fh5co_magna py-2"> Magna aliqua ut enim ad minim veniam quis--}}
{{--                            nostrud quis xercitation ullamco. </a> <a href="#" class="fh5co_mini_time py-3"> Thomson Smith ---}}
{{--                            April 18,2016 </a>--}}
{{--                        <div class="fh5co_consectetur"> Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea--}}
{{--                            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum--}}
{{--                            dolore.--}}
{{--                        </div>--}}
{{--                        <ul class="fh5co_gaming_topikk pt-3">--}}
{{--                            <li> Why 2017 Might Just Be the Worst Year Ever for Gaming</li>--}}
{{--                            <li> Ghost Racer Wants to Be the Most Ambitious Car Game</li>--}}
{{--                            <li> New Nintendo Wii Console Goes on Sale in Strategy Reboot</li>--}}
{{--                            <li> You and Your Kids can Enjoy this News Gaming Console</li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                </div>
                <div class="clearfix"></div>
                @include('partials.tags')
                @include('partials.mostPopular')
            </div>
        </div>

    </div>
</div>
