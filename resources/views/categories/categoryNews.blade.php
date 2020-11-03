@extends('layouts.main')
@section('content')
    <x-newsBlog :arrForNewsBlog="$arrForNewsBlog"
                :newsPerPageBlog="$newsPerPageBlog"
                :category="$category"
                :mostPopular="$mostPopular"
                :tags="$tags">

    </x-newsBlog>
@stop
