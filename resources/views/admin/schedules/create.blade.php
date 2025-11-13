<style>
.country-error {
    color: #dc3545;
    font-size: 0.95em;
    margin-top: 4px;
    display: none;
}
</style>
@extends('admin.layouts.layout')
@section('title', 'Add Schedule')
@section('content')
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
                <form action="{{ route('admin.schedule.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div id="batch-container">
                                        <div class="batch-item">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <h6 class="mb-0">Batch Details</h6>
                                                <button type="button" class="btn btn-sm btn-danger remove-batch"
                                                    style="display:none;">Delete</button>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-2">
                                                    <label class="form-label">Type <span class="text-danger">*</span></label>
                                                    <select name="type" class="form-control" required>
                                                        <option value="">Select</option>
                                                        <option value="Weekday">Weekday</option>
                                                        <option value="Weekend">Weekend</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label class="form-label">Batche <span class="text-danger">*</span></label>
                                                    <select name="batche" class="form-control" required>
                                                        <option value="">Select</option>
                                                        <option value="Classroom">Classroom</option>
                                                        <option value="Live Online Class">Live Online Class</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label class="form-label">Start Date <span class="text-danger">*</span></label>
                                                    <input type="text" name="start_date" class="form-control start-date" required>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label class="form-label">End Date <span class="text-danger">*</span></label>
                                                    <input type="text" name="end_date" class="form-control end-date" required>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label class="form-label">Total days of training</label>
                                                    <input type="text" name="total_days_of_training" class="form-control">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label class="form-label">Time Zone <span class="text-danger">*</span></label>
                                                    <select name="time_zone" class="form-control ctrm_select2" required>
                                                        <option value="">Select Time Zone</option>
                                                        @foreach($countries as $country)
                                                            @foreach(json_decode($country->timezones) as $time)
                                                            <option value="{{ $time->zoneName }}">{{ $time->zoneName }} ({{ $time->abbreviation }})</option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label class="form-label">Start Time <span class="text-danger">*</span></label>
                                                    <input type="time" name="starttime" class="form-control" required step="60">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label class="form-label">End Time  <span class="text-danger">*</span></label>
                                                    <input type="time" name="end_time" class="form-control" required step="60">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label class="form-label">Trainer Name</label>
                                                    <input type="text" name="trainner_name" class="form-control" placeholder="Enter trainer name">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label class="form-label">Trainer Image</label>
                                                    <input type="file" name="trainner_image" class="form-control">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label class="form-label">Language  <span class="text-danger">*</span></label>
                                                    <select name="language" class="form-control ctrm_select2" required>
                                                        <option value="">Select Language</option>
                                                        @foreach($languages as $lang)
                                                            <option value="{{ $lang->value }}" {{ strtolower($lang->value) == 'english' ? 'selected' : '' }}>{{ $lang->value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <label class="form-label">Trainer Description</label>
                                                    <textarea name="trainner_description" id="trainner_description" class="form-control ckeditor" rows="4" placeholder="Trainer description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pricing Section -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header d-block">
                                    <p class="text-danger mb-0">Note: Please add default Country(ALL) & Price</p>
                                    <div class=" d-flex justify-content-between align-items-center">
                                         <h5 class="mb-0">Pricing</h5>
                                        <button type="button" id="add-more-pricing" class="btn btn-sm btn-primary">+ Add
                                            More</button>
                                    </div>
                                </div>
                                <div class="card-body" id="pricing-container">
                                    <div id="country-duplicate-error" class="country-error">You have already selected this country in another row.</div>
                                    <div class="pricing-item mb-3">
                                        <div class="row g-2 align-items-end">
                                            <div class="col-md-4 country-col">
                                                <label class="form-label">Country  <span class="text-danger">*</span></label>
                                               <select name="country_id[]" class="form-select ctrm_select2" required>
                                                    <option value="">Select country</option>
                                                    <option value="0">All</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('country_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <div class="country-error" style="display:none;">You have already selected this country in another row.</div>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">Discount Price <span class="text-danger">*</span></label>
                                                <input type="text" step="0.01" name="discount_price[]" oninput="restrictToNumbers(this)" class="form-control discount-price" placeholder="e.g. 799" required>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">Original Price <span class="text-danger">*</span></label>
                                                <input type="text" step="0.01" name="original_price[]"
                                                    class="form-control original-price" oninput="restrictToNumbers(this)" placeholder="e.g. 1499" required>
                                                    <div class="price-error text-danger" style="display:none; font-size: 12px;">
                                                        Original Price must be greater than Discount.
                                                    </div>
                                            </div>

                                            <div class="col-md-2 d-flex align-items-end">
                                                <button type="button"
                                                    class="btn btn-sm btn-danger remove-pricing delete-btn"
                                                    disabled>Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="row mt-2">
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">Create Schedule</button>
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
        .ck-editor__editable[role="textbox"] {
            min-height: 200px;
        }
    </style>
@endpush
@push('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
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
                    if (val && selected.includes(val)) {
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
                    $('#country-duplicate-error').show();
                    $('html, body').animate({ scrollTop: $('#country-duplicate-error').offset().top - 100 }, 300);
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
@endpush
