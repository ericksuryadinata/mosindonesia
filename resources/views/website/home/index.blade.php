@extends('website.layout')
@section('title','Home')
@section('content')
    @include('website.home.partials.banner')
    {{-- @include('website.home.partials.tab') --}}
    {{-- @include('website.home.partials.about') --}}
    @include('website.home.partials.service')
    @include('website.home.partials.blog')
    {{-- @include('website.home.partials.testimonial') --}}
    @include('website.home.partials.address')
@endsection
