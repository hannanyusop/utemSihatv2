@extends('frontend.layouts.app')

@section('title', app_name() . ' | Join Us')
@section('meta')
    <meta property=”og:title” content=”Mentr — The College Preparation App”/> <meta property=”og:url” content=”http://mentr.io"/> <meta property=”og:site_name” content=”Mentr”/> <meta property=”og:image” content=”http://mentr.io/images/block_5.png"/> <meta property=”og:type” content=”website”/> <meta property=”og:description” content=”Mentr is a mobile app that provides innovative college preparation resources to high school students and their parents when they want it and where they want it. A network of current college students provide virtual college tours in real time, provide feedback on college essays, provide answers to a variety of college preparation questions. Students also participate in panel discussions to share their college preparation experiences with others.”/>

    <meta name="twitter:title" content="European Travel Destinations ">
    <meta name="twitter:description" content=" Offering tour packages for individuals or groups.">
    <meta name="twitter:image" content="{{ asset('img/system/meta-tags.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">
@endsection
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('assets/css/loading.css') }}" type="text/css">
@endpush

@section('content')

@endsection

@push('after-scripts')
@endpush
