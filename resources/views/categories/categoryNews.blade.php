@extends('layouts.main')
@section('content')
    <x-newsBlog :arrForNewsBlog="$arrForNewsBlog"
                :newsPerPageBlog="$newsPerPageBlog"
                :category="$category"
                :mostPopular="$mostPopular"
                :tags="$tags">

    </x-newsBlog>
    @if(isset($newsTrending) and !empty($newsTrending))
        <x-trending :newsTrending="$newsTrending"></x-trending>
    @endif
@stop
