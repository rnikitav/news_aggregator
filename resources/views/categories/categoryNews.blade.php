@extends('layouts.main')
@section('content')
    <x-newsBlog :arrForNewsBlog="$arrForNewsBlog" :newsPerPageBlog="$newsPerPageBlog"></x-newsBlog>
@stop
