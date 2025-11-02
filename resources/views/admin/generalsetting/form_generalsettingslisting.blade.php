@extends('admin.layouts.layout')
@section('title', 'General Settings')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">@lang('General Settings')</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (Session::has('success'))
                <p class="alert alert-success text-center fs-3">{{ Session::get('success') }}</p>
            @endif
            @if (Session::has('error'))
                <p class="alert {{ Session::get('alert-class', 'alert-danger') }} text-center fs-3">
                    {{ Session::get('error') }}
                </p>
            @endif
            <div class="content-body">
                <form action="{{ route('admin.general.setting.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card w-100">
                        <div class="card-body">

                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label for="name" class="form-label">@lang('Site Name')</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $existingSettings ? $existingSettings->name : '' }}"
                                        placeholder="@lang('Enter Site Name')">
                                    <span class="text-danger" id="name-error"></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="logo" class="form-label">@lang('Logo')</label>
                                    <input type="file" class="form-control" name="logo" id="logo">
                                    @if ($existingSettings && $existingSettings->logo != null)
                                        <a href="{{ asset('admin/generalSetting/' . $existingSettings->logo) }}"
                                            target="_blank">view image</a>
                                    @endif
                                    <span class="text-danger" id="logo-error"></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="email" class="form-label">@lang('Email')</label>
                                    <input type="eemail" class="form-control" name="email" id="email"
                                        placeholder="@lang('Enter Email')"
                                        value="{{ $existingSettings ? $existingSettings->email : '' }}">
                                    <span class="text-danger" id="email-error"></span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label for="mobile" class="form-label">@lang('Mobile')</label>
                                    <input type="text" class="form-control" name="mobile" id="mobile"
                                    oninput="restrictToNumbers(this)"
                                        placeholder="@lang('Enter Mobile')"
                                        value="{{ $existingSettings ? $existingSettings->mobile : '' }}">
                                    <span class="text-danger" id="mobile-error"></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="address" class="form-label">@lang('Address')</label>
                                    <input type="text" class="form-control" name="address" id="address"
                                        placeholder="@lang('Enter Address')"
                                        value="{{ $existingSettings ? $existingSettings->address : '' }}">
                                    <span class="text-danger" id="address-error"></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="facebook" class="form-label">@lang('Facebook')</label>
                                    <input type="text" class="form-control" name="facebook" id="facebook"
                                        placeholder="@lang('Enter Facebook URL')"
                                        value="{{ $existingSettings ? $existingSettings->facebook : '' }}">
                                    <span class="text-danger" id="facebook-error"></span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label for="twitter" class="form-label">@lang('Twitter')</label>
                                    <input type="text" class="form-control" name="twitter" id="twitter"
                                        placeholder="@lang('Enter Twitter URL')"
                                        value="{{ $existingSettings ? $existingSettings->twitter : '' }}">
                                    <span class="text-danger" id="twitter-error"></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="instagram" class="form-label">@lang('Instagram')</label>
                                    <input type="text" class="form-control" name="instagram" id="instagram"
                                        placeholder="@lang('Enter instagram URL')"
                                        value="{{ $existingSettings ? $existingSettings->instagram : '' }}">
                                    <span class="text-danger" id="instagram-error"></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="linkedin" class="form-label">@lang('LinkedIn')</label>
                                    <input type="text" class="form-control" name="linkedin" id="linkedin"
                                        placeholder="@lang('Enter LinkedIn URL')"
                                        value="{{ $existingSettings ? $existingSettings->linkedin : '' }}">
                                    <span class="text-danger" id="linkedin-error"></span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label for="linkedin" class="form-label">@lang('pinterest')</label>
                                    <input type="text" class="form-control" name="printest" id="printest"
                                        placeholder="@lang('Enter printest URL')"
                                        value="{{ $existingSettings ? $existingSettings->printest : '' }}">
                                    <span class="text-danger" id="printest-error"></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="logo" class="form-label">@lang('Icon')</label>
                                    <input type="file" class="form-control" name="icon" id="icon">
                                    @if ($existingSettings && $existingSettings->icon != null)
                                        <a href="{{ asset('admin/icon/' . $existingSettings->icon) }}" target="_blank">view
                                            image</a>
                                    @endif
                                    <span class="text-danger" id="icon-error"></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="meta_title" class="form-label">@lang('Meta')</label>
                                    <input type="text" class="form-control" name="meta_title" id="meta_title"
                                        placeholder="@lang('Enter Meta URL')"
                                        value="{{ $existingSettings ? $existingSettings->meta_title : '' }}">
                                    <span class="text-danger" id="meta_title-error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card w-100">
                        <div class="card-body">
                           <div id="country-phone-wrapper">
                                @if(!empty($savedCountryPhones))
                                    @foreach($savedCountryPhones as $index => $rule)
                                        <div class="row mb-3 country-phone-row">
                                            <div class="col-md-5">
                                                <label for="country" class="form-label">Country</label>
                                                <select name="country[]" class="form-control country-select">
                                                    <option value="">Select Country</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}" 
                                                            {{ (isset($rule['country_id']) && $country->id == $rule['country_id']) || (!isset($rule['country_id']) && $country->name == $rule['country']) ? 'selected' : '' }}>
                                                            {{ $country->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger country-error" style="display:none;"></span>
                                            </div>
                                            <div class="col-md-5">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="text" name="phone[]" class="form-control"
                                                    value="{{ $rule['phone'] ?? '' }}" placeholder="Enter phone number">
                                            </div>
                                            <div class="col-md-2 d-flex align-items-end">
                                                @if ($loop->first)
                                                    <button type="button" class="btn btn-success add-more">+</button>
                                                @else
                                                    <button type="button" class="btn btn-danger remove-row">-</button>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    {{-- Default empty row if no saved data --}}
                                    <div class="row mb-3 country-phone-row">
                                        <div class="col-md-5">
                                            <label for="country" class="form-label">Country</label>
                                            <select name="country[]" class="form-control country-select">
                                                <option value="">Select Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger country-error" style="display:none;"></span>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" name="phone[]" class="form-control"
                                                placeholder="Enter phone number">
                                        </div>
                                        <div class="col-md-2 d-flex align-items-end">
                                            <button type="button" class="btn btn-success add-more">+</button>
                                        </div>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('Save Settings')</button>
                </form>
            </div>
        </div>
    </div>
@endsection



@push('style')
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        /* Ensure Select2 arrow is visible and styled */
        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-style: none !important;
        }
    </style>
@endpush

@push('script')
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.country-select').select2({
                width: '100%',
                placeholder: 'Select Country',
                allowClear: true
            });

            // Only allow numbers in phone input
            $(document).on('input', 'input[name="phone[]"]', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });


           function validateCountries(showError = false) {
                let countries = [];
                let valid = true;

                $('.country-select').each(function () {
                    let val = $(this).val();
                    let errorSpan = $(this).closest('.col-md-5').find('.country-error');

                    // Reset error display
                    errorSpan.hide().text('');

                    if (!val) {
                        if (showError) {
                            errorSpan.text('Please select a country.').show();
                        }
                        valid = false;
                    } else if (countries.includes(val)) {
                        if (showError) {
                            let countryName = $(this).find('option:selected').text();
                            errorSpan.text(`The country "${countryName}" is already added.`).show();
                        }
                        valid = false;
                    }

                    countries.push(val);
                });

                return valid;
            }
            $(document).on('click', '.add-more', function(e) {
                e.preventDefault();

                if (!validateCountries(true)) {
                    return;
                }

                let row = $(this).closest('.country-phone-row');
                let clone = row.clone();
                clone.find('select, input').val('');
                clone.find('.add-more')
                    .removeClass('btn-success add-more')
                    .addClass('btn-danger remove-row')
                    .text('-');

                clone.find('.select2').remove();
                clone.find('.country-select').select2('destroy');

                $('#country-phone-wrapper').append(clone);
                clone.find('.country-select').select2({
                    width: '100%',
                    placeholder: 'Select Country',
                    allowClear: true
                });
            });

            // Validate on country change
            $(document).on('change', '.country-select', function() {
                validateCountries(true);
            });

            $(document).on('click', '.remove-row', function(e) {
                e.preventDefault();
                $(this).closest('.country-phone-row').remove();
            });
        });
    </script>
@endpush
