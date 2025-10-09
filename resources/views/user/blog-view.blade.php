@extends('user.layouts.layout')

@section('title', $blog->title)
@section('meta_description', $blog->meta)

@section('content')
<!-- Blog Detail Section -->
<section class="blog-section my-5 ptb-60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                {{-- Blog Title --}}
                <h2 class="fw-bold mb-4">{{ $blog->title }}</h2>


                {{-- Blog Image --}}
                @if($blog->image)
                    <div class="mb-4">
                        <img src="{{ asset('admin/blog/' . $blog->image) }}" alt="Blog Image" class="img-fluid w-100 rounded shadow-sm" style="max-height: 450px; object-fit: cover;">
                    </div>
                @endif

                {{-- Meta Info --}}
                <ul class="list-inline text-muted small d-flex justify-content-between flex-wrap mb-3 px-1">
                    <li class="list-inline-item mb-2">
                        <i class="ri-calendar-2-line"></i>
                        {{ \Carbon\Carbon::parse($blog->date)->format('d M, Y') }}
                    </li>
                    <li class="list-inline-item mb-2">
                        <i class="ri-price-tag-3-line"></i>
                        {{ $blog->categories }}
                    </li>
                </ul>
                {{-- Blog Description --}}
                <div class="blog-description" style="text-align: justify; line-height: 1.8; font-size: 1.1rem;">
                    {!! $blog->description !!}
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
