@extends('master')

@section('content')

    <site 
        appUrl="{{ url('/') }}"
        v-bind:siteId="{{ $currentSite }}">
    </site>

@stop