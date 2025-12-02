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
            <form action="{{ route('admin.schedule.update', $schedule->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="course_id" value="{{ $schedule->course_id }}">

                {{-- Batch Details --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">Type</label>
                                        <select name="type" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="Weekday" {{ $schedule->type == 'Weekday' ? 'selected' : '' }}>Weekday</option>
                                            <option value="Weekend" {{ $schedule->type == 'Weekend' ? 'selected' : '' }}>Weekend</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">Batche</label>
                                        <select name="batche" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="Classroom" {{ $schedule->batche == 'Classroom' ? 'selected' : '' }}>Classroom</option>
                                            <option value="Live Online Class" {{ $schedule->batche == 'Live Online Class' ? 'selected' : '' }}>Live Online Class</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">Start Date</label>
                                        <input type="text" name="start_date"
                                            value="{{ $schedule->start_date ? $schedule->start_date->format('d-m-Y') : '' }}"
                                            class="form-control start-date"
                                            required>
                                    </div>
                                    
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">End Date</label>
                                        <input type="text" name="end_date"
                                            value="{{ $schedule->end_date ? $schedule->end_date->format('d-m-Y') : '' }}"
                                            class="form-control end-date"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">Total days of training</label>
                                        <input type="text" name="total_days_of_training" value="{{ $schedule->total_days_of_training }}" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">Time Zone</label>
                                        <!-- <select name="time_zone" class="form-control ctrm_select2" required>
                                            <option value="">Select Time Zone</option>
                                            @foreach($countries as $country)
                                                @foreach(json_decode($country->timezones) as $time)
                                                    <option value="{{ $time->zoneName }}" 
                                                        {{ $schedule->time_zone == $time->zoneName ? 'selected' : '' }}>
                                                        {{ $time->zoneName }} ({{ $time->abbreviation }})
                                                    </option>
                                                @endforeach
                                            @endforeach
                                        </select> -->

                                        <select name="time_zone" class="form-control ctrm_select2" id="time_zone" required>
                                            <option value="">Select Time Zone</option>
                                            @foreach($countries as $country)
                                                @foreach(json_decode($country->timezones) as $time)
                                                    <option value="{{ $time->zoneName }}" 
                                                    data-country="{{ $country->name }}" data-country-id="{{ $country->id }}"
                                                    {{ $schedule->time_zone == $time->zoneName ? 'selected' : '' }}>
                                                        {{ $time->zoneName }} ({{ $time->abbreviation }})
                                                    </option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">Start Time</label>
                                        <input type="time" class="form-control" name="starttime" step="60"
                                            value="{{ $schedule->starttime }}" 
                                            required 
                                        >
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">End Time</label>
                                        <input type="time" name="end_time" class="form-control" step="60"
                                            value="{{ $schedule->end_time }}" 
                                            required 
                                        >
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">Trainer Name</label>
                                        <input type="text" name="trainner_name" value="{{ $schedule->trainner_name }}" class="form-control" placeholder="Enter trainer name">
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">Trainer Image</label>
                                        <input type="file" name="trainner_image" class="form-control">
                                        @if($schedule->trainner_image)
                                            <img src="{{ asset('uploads/trainners/' . $schedule->trainner_image) }}" alt="Trainer Image" style="max-width:60px;max-height:60px;border-radius:6px;margin-top:6px;">
                                        @endif
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">Language</label>
                                        <select name="language" class="form-control ctrm_select2" required>
                                            <option value="">Select Language</option>
                                            @foreach($languages as $lang)
                                                <option value="{{ $lang->value }}" {{ $schedule->language == $lang->value ? 'selected' : '' }}>{{ $lang->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label">Trainer Description</label>
                                        <textarea name="trainner_description" id="trainner_description" class="form-control" rows="4" placeholder="Trainer description">{{ $schedule->trainner_description }}</textarea>
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
                                <!-- <button type="button" id="add-more-pricing" class="btn btn-sm btn-primary">+ Add More</button> -->
                            </div>
                            <div class="card-body" id="pricing-container">
                                @foreach($schedule->getPrices as $index => $price)
                                    <div class="pricing-item mb-3">
                                        <div class="row g-2 align-items-end">
                                            <div class="col-md-4 country-col">
                                                <label class="form-label">Country</label>
                                                <input type="text" class="form-control" name="country" id="country" readonly>
                                                <input type="hidden" class="form-control" value="price->country_id" name="country_id" id="country_id">
                                            </div>

                                           <div class="col-md-3">
                                                <label class="form-label">Discount Price</label>
                                                <input type="text" step="0.01" name="discount_price"
                                                    class="form-control discount-price" value="{{ $price->discount_price }}" required>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">Original Price</label>
                                                <input type="text" step="0.01" name="original_price"
                                                    class="form-control original-price" oninput="restrictToNumbers(this)" value="{{ $price->original_price }}" required>
                                                <div class="price-error text-danger" style="display:none; font-size: 12px;">
                                                    Original Price must be greater than Discount.
                                                </div>
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
        .ck-editor__editable[role="textbox"] {
            min-height: 200px;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            function initFlatpickr() {
                $('.start-date').flatpickr({
                    dateFormat: 'd-m-Y'
                });
                $('.end-date').flatpickr({
                    dateFormat: 'd-m-Y'
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
            ClassicEditor
            .create(document.querySelector('#trainner_description'))
            .then(function(editor) {
                $(editor.ui.view.editable.element).css('min-height', '200px');
            })
            .catch(function(error) {
                console.error(error);
            });
             function validatePrices($row) {
                let discount = parseFloat($row.find('.discount-price').val()) || 0;
                let original = parseFloat($row.find('.original-price').val()) || 0;

                if (discount >= original && discount > 0 && original > 0) {
                    $row.find('.price-error').show();
                    return false;
                } else {
                    $row.find('.price-error').hide();
                    return true;
                }
            }

            // Attach keyup/change validation
            $(document).on('keyup change', '.discount-price, .original-price', function () {
                let $row = $(this).closest('.pricing-item');
                validatePrices($row);
            });

            // Prevent submit if any invalid
            $('form').on('submit', function(e) {
                let valid = true;
                $('#pricing-container .pricing-item').each(function () {
                    if (!validatePrices($(this))) {
                        valid = false;
                    }
                });
                if (!valid) {
                    e.preventDefault();
                    alert("Please fix pricing errors before submitting.");
                }
            });
        });
    </script>
    <script>
$(document).ready(function () {
    function updateCountryFields() {
        let selected = $('#time_zone').find(':selected');
        let selectedCountry = selected.data('country') || '';
        let selectedCountryId = selected.data('country-id') || '';

        $('#country').val(selectedCountry);
        $('#country_id').val(selectedCountryId);
    }

    // Initialize Select2 if you're using it
    $('#time_zone').select2();

    // Update on change
    $('#time_zone').on('change', updateCountryFields);

    // Run after Select2 fully initializes
    setTimeout(function () {
        updateCountryFields();
    }, 200);
});
</script>

@endpush
