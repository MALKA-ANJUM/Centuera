@extends('user.layouts.layout')

@section('title', $dynamicPages->title)

@section('content')
<div class="blog-section ptb-100">
    <div class="container">
        <h3 class="tab-heading">{{ $dynamicPages->title }}</h3>
        <hr class="tab-hr">

        {{-- Render HTML from database --}}
        {!! $dynamicPages->content !!}
    </div>
</div>
@endsection
