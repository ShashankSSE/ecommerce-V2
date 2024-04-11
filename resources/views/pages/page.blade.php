@extends('components.app')
@section('title', 'Patakha')
@section('meta_description', '')
@section('meta_keywords','')
@section('content')
    <div class="container faq">
        <div class="heading">
            {{$page->title}}
        </div>
        <div class="content">
            {!! $page->desc !!}
        </div>
        
    </div>
@endsection