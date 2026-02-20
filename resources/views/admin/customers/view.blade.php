@extends('admin.layouts.layout')
@section('title', 'Customer View')
@section('content')

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">

        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">@lang('Customer View')</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center p-4">

                    <div class="mb-2">
                        <div class="avatar bg-light-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width:70px; height:70px;">
                            <span class="fw-bold fs-3 text-primary">
                                {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
                            </span>
                        </div>
                        <h4 class="fw-bold mb-0">{{ $user->first_name }} {{ $user->last_name }}</h4>
                        <small class="">{{ $user->email }}</small>
                    </div>

                    <hr class="my-1">

                    <div class="row text-start">
                        {{-- Row 1 --}}
                        <div class="col-md-4 col-6 mb-3">
                            <p class="mb-1 text-muted small">Mobile</p>
                            <h6 class="mb-0">{{ $user->mobile ?? 'N/A' }}</h6>
                        </div>

                        <div class="col-md-4 col-6 mb-3">
                            <p class="mb-1 text-muted small">Gender</p>
                            <h6 class="mb-0">
                                @if($user->gender == 'M')
                                    Male
                                @elseif($user->gender == 'F')
                                    Female
                                @else
                                    N/A
                                @endif
                            </h6>
                        </div>

                        <div class="col-md-4 col-6 mb-3">
                            <p class="mb-1 text-muted small">DOB</p>
                            <h6 class="mb-0">{{ $user->dob ? \Carbon\Carbon::parse($user->dob)->format('d M, Y') : 'N/A' }}</h6>
                        </div>

                        {{-- Row 2 --}}
                        <div class="col-md-4 col-6 mb-3">
                            <p class="mb-1 text-muted small">State</p>
                            <h6 class="mb-0">{{ $user->state ?? 'N/A' }}</h6>
                        </div>

                        <div class="col-md-4 col-6 mb-3">
                            <p class="mb-1 text-muted small">City</p>
                            <h6 class="mb-0">{{ $user->city ?? 'N/A' }}</h6>
                        </div>

                        <div class="col-md-4 col-6 mb-3">
                            <p class="mb-1 text-muted small">Joined On</p>
                            <h6 class="mb-0">{{ $user->created_at ? $user->created_at->format('d M, Y') : 'N/A' }}</h6>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


    </div>
</div>
<!-- END: Content-->
@endsection
