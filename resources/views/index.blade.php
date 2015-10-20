@extends('app')

@section('content')
	@include('sections.welcome', ['BGColor' => Config::get('constants.COLOR_LIGHT_BLUE')] )
	@include('sections.blog_entry', ['BGColor' => Config::get('constants.COLOR_DARK_BLUE')] )
	@include('sections.quote', ['BGColor' => Config::get('constants.COLOR_LIGHT_BLUE')] )
	@include('sections.footer', ['BGColor' => Config::get('constants.COLOR_DARK_BLUE')] )
@stop