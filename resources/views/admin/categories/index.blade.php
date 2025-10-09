@extends('admin.layouts.layout')

@section('title', 'Categories')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <h2 class="content-header-title float-start mb-0">@lang('Categories')</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">@lang('Categories')</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <section id="categories-list">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                {{-- Flash Messages --}}
                                @if (Session::has('message'))
                                    <p class="alert alert-success text-center fs-5">
                                        {{ Session::get('message') }}
                                    </p>
                                @endif

                                @if (Session::has('error'))
                                    <p class="alert alert-danger text-center fs-5">
                                        {{ Session::get('error') }}
                                    </p>
                                @endif

                                {{-- Header + Add button --}}
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                                        <i class="fa fa-plus"></i> Add New Category
                                    </a>

                                    <form action="{{ route('admin.categories.index') }}" method="GET" class="d-flex">
                                        <input type="text" name="search" class="form-control" placeholder="Search Name"
                                               value="{{ request()->get('search') }}">
                                        <button type="submit" class="btn btn-primary ms-2">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary ms-1">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                    </form>
                                </div>

                                {{-- Table --}}
                                <div class="card-datatable table-responsive">
                                    <table class="datatables-ajax table table-hover">
                                        <thead>
                                            <tr>
                                                <th>@lang('ID')</th>
                                                <th>@lang('Title')</th>
                                                <th>@lang('Action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($categoriess) > 0)
                                                @foreach ($categoriess as $index => $category)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $category->name }}</td>
                                                        <td>
                                                            <a class="btn btn-outline-success"
                                                                href="{{route('admin.categories.edit',$category->id)}}"
                                                                id="editblog"><i class="fa fa-edit"></i></a>
                                                            <a href="{{route('admin.categories.delete',$category->id)}}"
                                                                class="btn btn-outline-danger"><i
                                                                    class="fa fa-trash"></i></a>

                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr class="text-center">
                                                    <td colspan="4">No data found</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    @if (count($categoriess) > 0)
                                        {{ $categoriess->links('pagination::bootstrap-5') }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
