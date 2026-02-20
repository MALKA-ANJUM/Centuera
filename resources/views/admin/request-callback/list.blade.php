@extends('admin.layouts.layout')
@section('title', 'Callback Request')
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
                            <h2 class="content-header-title float-start mb-0">@lang('Request Callback')</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="ajax-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                               <div class="card-header border-bottom">
                                    <button id="deleteSelectedCallbacks" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                     <a href="{{ route('admin.request.export') }}" class="btn btn-success">
                                        <i class="fa fa-file-excel"></i>
                                    </a>
                               </div>
                                <div class="card-datatable table-responsive">
                                    <table class="datatables-ajax table table-hover">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="selectAllCallbacks"></th>
                                                <th>Sl. No</th>
                                                <th>@lang('Date')</th>
                                                <th>@lang('Name')</th>
                                                <th>@lang('Country')</th>
                                                <th>@lang('Mobile')</th>
                                                <th>@lang('Email')</th>
                                                <th>@lang('Program')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($callbacks) > 0)
                                                @foreach ($callbacks as $index => $callback)
                                                    <tr>
                                                        <td><input type="checkbox" class="callback-checkbox form-check-input" value="{{ $callback->id }}"></td>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{($callback->created_at)->format('d-M-Y') }}</td>
                                                        <td>{{ $callback->name }}</td>
                                                        <td>{{ $callback->getCountry->name }}</td>
                                                        <td>@if($callback->phone) + @endif{{ $callback->country_code }} {{ $callback->phone }}</td>
                                                        <td>{{ $callback->email }}</td>
                                                        <td>{{ $callback->course ? $callback->course->title : 'Other' }}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr class="text-center">
                                                    <td colspan="8">No data found</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    @if (count($callbacks) > 0)
                                        {{ $callbacks->links('pagination::bootstrap-5') }}
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

@push('script')
<script>
    // Select/Deselect all callbacks
$(document).on("change", "#selectAllCallbacks", function() {
    $(".callback-checkbox").prop("checked", $(this).is(":checked"));
});

// Multi-delete action
$(document).on("click", "#deleteSelectedCallbacks", function() {
    let selected = $(".callback-checkbox:checked").map(function() {
        return $(this).val();
    }).get();

    if (selected.length === 0) {
        toastr.warning("Please select at least one callback to delete.");
        return;
    }

    Swal.fire({
        title: "Are you sure?",
        text: "You want to delete selected callbacks?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ route('admin.callback.deleteSelected') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    ids: selected
                },
                success: function(response) {
                    if (response.status === "success") {
                        Toastify({
                            text: response.message,
                            duration: 5000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4fbe87",
                        }).showToast();
                        setTimeout(function() {
                            location.reload();
                        }, 200);
                    } else {
                        Toastify({
                            text: response.message,
                            duration: 5000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#f3616d",
                        }).showToast();
                    }
                },
                error: function(xhr) {
                    toastr.error("Something went wrong. Please try again.");
                }
            });
        }
    });
});


</script>
@endpush
