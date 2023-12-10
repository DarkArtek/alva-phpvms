@extends('app_pages')
@section('title', $page->name)

@section('content')
  {!! $page->body !!}
@endsection
