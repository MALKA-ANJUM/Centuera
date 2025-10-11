@extends('admin.layouts.layout')
@section('title', 'Edit Schedule')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Edit Schedule</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.schedule.index') }}">Home</a></li>
                                <li class="breadcrumb-item active">Edit Schedule</li>
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
            <form action="{{ route('admin.schedule.update', $schedule->id) }}" method="POST">
                @csrf
                <input type="hidden" name="course_id" value="{{ $schedule->course_id }}">

                {{-- Batch Details --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Type</label>
                                        <select name="type" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="Weekday" {{ $schedule->type == 'Weekday' ? 'selected' : '' }}>Weekday</option>
                                            <option value="Weekend" {{ $schedule->type == 'Weekend' ? 'selected' : '' }}>Weekend</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Batche</label>
                                        <select name="batche" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="Classroom" {{ $schedule->batche == 'Classroom' ? 'selected' : '' }}>Classroom</option>
                                            <option value="Live Online Class" {{ $schedule->batche == 'Live Online Class' ? 'selected' : '' }}>Live Online Class</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Start Date</label>
                                        <input type="text" name="start_date" value="{{ $schedule->start_date }}" class="form-control start-date" required>
                                    </div>

                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">End Date</label>
                                        <input type="text" name="end_date" value="{{ $schedule->end_date }}" class="form-control end-date" required>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">Time Zone</label>
                                        <select name="time_zone" class="form-control ctrm_select2" required>
                                            <option value="">Select Time Zone</option>
                                            @foreach (timezone_identifiers_list() as $tz)
                                                <option value="{{ $tz }}" {{ $schedule->time_zone == $tz ? 'selected' : '' }}>{{ $tz }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">Start Time</label>
                                        <input type="time" name="starttime" value="{{ $schedule->starttime }}" class="form-control" required step="60">
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">End Time</label>
                                        <input type="time" name="end_time" value="{{ $schedule->end_time }}" class="form-control" required step="60">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Pricing --}}
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Pricing</h5>
                                <button type="button" id="add-more-pricing" class="btn btn-sm btn-primary">+ Add More</button>
                            </div>
                            <div class="card-body" id="pricing-container">
                                @foreach($schedule->prices as $index => $price)
                                    <div class="pricing-item mb-3">
                                        <div class="row g-2 align-items-end">
                                            <div class="col-md-4 country-col">
                                                <label class="form-label">Country</label>
                                                <select name="country_id[]" class="form-select ctrm_select2" required>
                                                    <option value="">Select country</option>
                                                    <option value="0" {{ $price->country_id == 0 ? 'selected' : '' }}>All</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->id }}" {{ $price->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="country-error text-danger" style="display:none;">You have already selected this country in another row.</div>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">Discount Price</label>
                                                <input type="number" step="0.01" name="discount_price[]" class="form-control" value="{{ $price->discount_price }}" required>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">Original Price</label>
                                                <input type="number" step="0.01" name="original_price[]" class="form-control" value="{{ $price->original_price }}" required>
                                            </div>

                                            <div class="col-md-2 d-flex align-items-end">
                                                <button type="button" class="btn btn-sm btn-danger remove-pricing">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="row mt-2">
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Update Schedule</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('style')
    <style>
        .select2-selection__arrow b {
            display: none !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 100%;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            width: 28px;
            display: flex;
            align-items: center;
        }

        .select2-container--default .select2-selection--single {
            min-height: 38px;
            padding-right: 30px;
            border: 1px solid #d8d6de;
            background-color: #fff;
        }
        .country-error.text-danger {
            color: #dc3545 !important;
        }
    </style>
@endpush
@push('script')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            function initFlatpickr() {
                $('.start-date').flatpickr({
                    dateFormat: 'Y-m-d'
                });
                $('.end-date').flatpickr({
                    dateFormat: 'Y-m-d'
                });
            }
            initFlatpickr();

            function initSelect2() {
                $('.ctrm_select2').select2({
                    width: '100%'
                }).off('change.duplicate').on('change.duplicate', function() {
                    validateCountryDuplicates();
                });
            }
            initSelect2();

            function validateCountryDuplicates() {
                var selected = [];
                var hasDuplicate = false;
                $('.country-error').hide();
                $('.ctrm_select2').each(function() {
                    var val = $(this).val();
                    if (val && val !== "" && selected.includes(val)) {
                        hasDuplicate = true;
                        $(this).closest('.country-col').find('.country-error').show();
                    }
                    selected.push(val);
                });
                return !hasDuplicate;
            }

            $('#add-more-pricing').on('click', function() {
                let $firstItem = $('#pricing-container .pricing-item').first();
                let $clone = $firstItem.clone();
                $clone.find('input').val('');
                $clone.find('.remove-pricing').prop('disabled', false).show();
                // Reset country select to default
                $clone.find('.ctrm_select2').val('').trigger('change');
                $clone.find('.ctrm_select2').each(function() {
                    if ($.fn.select2 && $(this).data('select2')) {
                        $(this).select2('destroy');
                    }
                    if ($(this).next('.select2').length) {
                        $(this).next('.select2').remove();
                    }
                });
                $('#pricing-container').append($clone);
                $('#pricing-container .pricing-item .remove-pricing').prop('disabled', false).show();
                $('#pricing-container .pricing-item').first().find('.remove-pricing').prop('disabled', true);
                initSelect2();
                validateCountryDuplicates();
            });

            $(document).on('click', '.remove-pricing', function() {
                $(this).closest('.pricing-item').remove();
                $('#pricing-container .pricing-item').first().find('.remove-pricing').prop('disabled', true);
                validateCountryDuplicates();
            });
            // Prevent form submit if duplicate country
            $('form').on('submit', function(e) {
                if (!validateCountryDuplicates()) {
                    e.preventDefault();
                    // Scroll to first visible error
                    var $err = $('.country-error:visible').first();
                    if ($err.length) {
                        $('html, body').animate({ scrollTop: $err.offset().top - 100 }, 300);
                    }
                }
            });
        });
    </script>
@endpush
