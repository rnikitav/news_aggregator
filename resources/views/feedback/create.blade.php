@extends('layouts.main')
@section('content')
    <div class="container-fluid contact_us_bg_img">
        <div class="container">
            <div class="row">
                <a href="/" class="fh5co_con_123"><i class="fa fa-home"></i></a>
                <a href="#" class="fh5co_con pt-2"> Contact Us </a>
            </div>
        </div>
    </div>
    <div class="col-8 offset-2">
        @if (session('status'))
            <div class="alert alert-success">
                <h3>{{ session('status') }}</h3>
            </div>
        @endif
    </div>
    <div class="col-8 offset-2">
        @if (session('error'))
            <div class="alert alert-danger">
                <h3>{{ session('error') }}</h3>
            </div>
        @endif
    </div>
    <div class="container-fluid mb-4">
        <div class="container">
            <div class="col-12 text-center contact_margin_svnit ">
                <div class="text-center fh5co_heading py-2">Contact Us</div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <form method="post" class="row" id="fh5co_contact_form" action="{{route('feedback.store')}}">
                        @csrf
                        <div class="col-12 py-3">
                            <input type="text" class="form-control fh5co_contact_text_box"
                                   name="name" value="{{old('name')}}" placeholder="Enter Your Name" />
                        </div>
                        <div class="col-6 py-3">
                            <input type="text" class="form-control fh5co_contact_text_box"
                                   name="email" value="{{old('email')}}" placeholder="E-mail" />
                        </div>
                        <div class="col-6 py-3">
                            <input type="text" class="form-control fh5co_contact_text_box"
                                   name="title" value="{{old('title')}}" placeholder="Subject" />
                        </div>
                        <div class="col-12 py-3">

                                @if(!empty(old('description')))
                                <textarea class="form-control fh5co_contacts_message"
                                          name="description"
                                          rows="10">
                                {!! old('description') !!}
                                    </textarea>

                                @else
                                            <textarea class="form-control fh5co_contacts_message"
                                                      name="description"
                                                      rows="10"
                                                      placeholder="Message"></textarea>
                                @endif

                        </div>
                        <div class="col-12 py-3 text-center">
                        <button class="btn contact_btn" type="submit">Отправить отзыв</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-6 align-self-center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3168.639290621062!2d-122.08624618469247!3d37.421999879825215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sbe!4v1514861541665" class="map_sss" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid  fh5co_fh5co_bg_contcat">
        <div class="container">
            <div class="row py-4">
                <div class="col-md-4 py-3">
                    <div class="row fh5co_contact_us_no_icon_difh5co_hover">
                        <div class="col-3 fh5co_contact_us_no_icon_difh5co_hover_1">
                            <div class="fh5co_contact_us_no_icon_div"> <span><i class="fa fa-phone"></i></span> </div>
                        </div>
                        <div class="col-9 align-self-center fh5co_contact_us_no_icon_difh5co_hover_2">
                            <span class="c_g d-block">Call Us</span>
                            <span class="d-block c_g fh5co_contact_us_no_text">+1 800 559 658</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 py-3">
                    <div class="row fh5co_contact_us_no_icon_difh5co_hover">
                        <div class="col-3 fh5co_contact_us_no_icon_difh5co_hover_1">
                            <div class="fh5co_contact_us_no_icon_div"> <span><i class="fa fa-envelope"></i></span> </div>
                        </div>
                        <div class="col-9 align-self-center fh5co_contact_us_no_icon_difh5co_hover_2">
                            <span class="c_g d-block">Have any questions?</span>
                            <span class="d-block c_g fh5co_contact_us_no_text">News@example.com</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 py-3">
                    <div class="row fh5co_contact_us_no_icon_difh5co_hover">
                        <div class="col-3 fh5co_contact_us_no_icon_difh5co_hover_1">
                            <div class="fh5co_contact_us_no_icon_div"> <span><i class="fa fa-map-marker"></i></span> </div>
                        </div>
                        <div class="col-9 align-self-center fh5co_contact_us_no_icon_difh5co_hover_2">
                            <span class="c_g d-block">Address</span>
                            <span class="d-block c_g fh5co_contact_us_no_text"> 123 Some Street USA</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
    </div>

@stop
