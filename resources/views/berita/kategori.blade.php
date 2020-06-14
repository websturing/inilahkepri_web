@extends('welcome')
@section('head-meta')
<title>inilahkepri.id - Disini Kami Berbagi</title>
<link rel="icon" type="image/png" sizes="16x16" href="{{url('public/images/fav.png')}}">
<meta property="og:url" content="inilahkepri.id" />
<meta property="og:type" content="article" />

@endsection

@section('content')
<inilahnews></inilahnews>
@endsection
