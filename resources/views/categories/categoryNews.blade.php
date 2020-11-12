@extends('layouts.main')
@section('content')
    <x-newsBlog :arrForNewsBlog="$arrForNewsBlog"
                :category="$category"
                :mostPopular="$mostPopular"
                :tags="$tags"
                :paginateForPage="$paginateForPage">

    </x-newsBlog>
    @if(isset($newsTrending) and !empty($newsTrending))
        <x-trending :newsTrending="$newsTrending"></x-trending>
    @endif
@stop
