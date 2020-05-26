@extends('welcome')
@section('head-meta')
<title>{{$album[0]->judul}}</title>
<link rel="icon" type="image/png" sizes="16x16" href="{{url('public/images/fav.png')}}">
<meta property="og:url" content="{{$urlLink}}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{$album[0]->judul}}" />
<meta property="og:description" content="{{$description}}" />
<meta property="og:image" content="{{$gambarLink}}" />
@endsection

@section('content')
<album-Detail :id="{{ $id }}"></album-Detail>
@endsection
