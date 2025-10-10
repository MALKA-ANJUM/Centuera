@extends('admin.layouts.layout')
@section('title', 'Add Schedule')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">@lang('Add Schedule')</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.schedule.index') }}">Home</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }} text-center fs-3">
                {{ Session::get('error') }}
            </p>
        @endif

        <div class="content-body">
            <form action="" method="POST">
                @csrf
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div id="batch-container">
                                    <div class="batch-item mb-3">
                                        <!-- Row Header with Delete Btn -->
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="mb-0">Batch Details</h6>
                                            <button type="button" class="btn btn-sm btn-danger remove-batch" style="display:none;">Delete</button>
                                        </div>

                                        <!-- Batch Type & Number of Days -->
                                        <div class="row">
                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">Type</label>
                                                <select name="batch_type[]" class="form-control" required>
                                                    <option value="">Select</option>
                                                    <option value="Weekday">Weekday</option>
                                                    <option value="Weekend">Weekend</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">Batche</label>
                                               <select name="batch[]" class="form-control" required>
                                                    <option value="">Select</option>
                                                    <option value="Classroom">Classroom</option>
                                                    <option value="Live Online Class">Live Online Class</option>
                                                </select>
                                            </div>
                                      
                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">Start Date</label>
                                                <input type="text" name="start_date[]" class="form-control start-date" required>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">End Date</label>
                                                <input type="text" name="end_date[]" class="form-control end-date" required>
                                            </div>
                                        

                                            <div class="col-md-6 mb-2">
                                                <label class="form-label">Start Time</label>
                                                <input type="time" name="start_time[]" class="form-control" required step="60">
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="form-label">End Time</label>
                                                <input type="time" name="end_time[]" class="form-control" required step="60">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pricing Column -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Pricing</h5>
                                <button type="button" id="add-more-pricing" class="btn btn-sm btn-primary">+ Add More</button>
                            </div>
                            <div class="card-body" id="pricing-container">
                                <div class="pricing-item mb-3">
                                    <div class="mb-2">
                                        <label class="form-label">Discounted Price</label>
                                        <input type="number" step="0.01" name="discount_price[]" class="form-control" placeholder="e.g. 799" required>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Original Price</label>
                                        <input type="number" step="0.01" name="original_price[]" class="form-control" placeholder="e.g. 1499" required>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-danger remove-pricing" style="display:none;">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Submit Button Row -->
                <div class="row mt-3">
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Create Schedule</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection

@push('script')
<!-- Flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
$(document).ready(function () {

    // Initialize Flatpickr
    function initFlatpickr() {
        $('.start-date').flatpickr({ dateFormat: 'Y-m-d' });
        $('.end-date').flatpickr({ dateFormat: 'Y-m-d' });
        $('.start-time').flatpickr({ enableTime: true, noCalendar: true, dateFormat: 'H:i' });
        $('.end-time').flatpickr({ enableTime: true, noCalendar: true, dateFormat: 'H:i' });
    }

    initFlatpickr();

    $('#add-more-pricing').on('click', function () {
        let $firstItem = $('#pricing-container .pricing-item').first();
        let $clone = $firstItem.clone();

        $clone.find('input').val('');
        $clone.find('.remove-pricing').show();

        $('#pricing-container').append($clone);
    });

    $(document).on('click', '.remove-pricing', function () {
        $(this).closest('.pricing-item').remove();
    });

});
</script>
@endpush

