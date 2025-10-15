@extends('user.layouts.layout')
@section('title', 'Dashboard')
@section('content')
<!-- BEGIN: Content-->

<!--  Page Title Area Start-->
    <section class="page-title-area position-relative">
        <div class="container">
            <div class="main-max-width">
                <div class="page-title-content">
                    <h2>Custom Payment</h2>
                    <ul class="page-breadcrumb align-items-center list-unstyle">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"></li>
                        <li class="primery-link">Custom Payment</li>
                    </ul>

                </div>
            </div>
        </div>
    </section>

    {{--  --}}
<div class="container my-5">
    <div class="col-md-10 mx-auto">
        <div class="card shadow-lg rounded-4 border-0 mw-100">
            <div class="card-header bg-white border-0">
                <h3 class="fw-bold mb-0">Custom Checkout</h3>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('custom-payment.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <!-- Full Name -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                            @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <!-- Email -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email ID <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" placeholder="Email ID">
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select name="country_code" class="phone-flag form-select rounded-start-3 me-0 select2" required>
                                    @foreach($countries as $country)
                                    <option
                                        value="{{ $country->phonecode }}"
                                        data-flag='{!! $country->flag !!}'
                                        data-id="{{ $country->id }}"
                                        data-currency="{{ $country->currency }}">
                                        +{{ $country->phonecode }} {!! $country->flag !!}
                                    </option>
                                    @endforeach
                                </select>
                                <input type="text" name="phone" class="form-control" placeholder="Contact Number">
                            </div>
                             @error('phone')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Course -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Course <span class="text-danger">*</span></label>
                            <select class="form-select select2" name="course">
                                <option>Select course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                            </select>
                            @error('course')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                            <button type="button" class="btn btn-primary w-100 mt-2 fw-semibold" style="background:#0d2c6c;">
                                Add Course +
                            </button>
                        </div>

                        <!-- Currency -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Currency <span class="text-danger">*</span></label>
                            <input type="text" name="currency" id="currency" class="form-control" readonly>
                        </div>

                        <!-- Total Amount -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Total Amount <span class="text-danger">*</span></label>
                            <input type="text" name="amount" class="form-control" placeholder="Total Amount">
                            @error('amount')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Workshop Date -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Workshop Date</label>
                            <input type="text" name="date" class="form-control" placeholder="dd-mm-yyyy,dd-mm-yyyy">
                        </div>

                        <!-- Referral -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Referral Code (Optional)</label>
                            <input type="text" name="referral" class="form-control" placeholder="Enter Referral Code">
                        </div>
                    </div>

                    <!-- Payment Options -->
                    <div class="row text-center mt-4 g-3">
                        <div class="col-md-3">
                            <div class="p-3 border rounded-3 shadow-sm">
                                <img src="/images/stripe.png" class="mb-2" style="height:30px;">
                                <button class="btn btn-danger w-100">Pay with Stripe</button>
                                <small class="text-muted d-block mt-1">Major Credit / Debit Cards accepted.</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3 border rounded-3 shadow-sm">
                                <img src="/images/paypal.png" class="mb-2" style="height:30px;">
                                <button class="btn btn-danger w-100">Pay with PayPal</button>
                                <small class="text-muted d-block mt-1">Major Credit / Debit Cards accepted.</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3 border rounded-3 shadow-sm">
                                <img src="/images/splitit.png" class="mb-2" style="height:30px;">
                                <button class="btn btn-danger w-100">Pay with Splitit</button>
                                <small class="text-muted d-block mt-1">Credit Cards only.</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3 border rounded-3 shadow-sm">
                                <img src="/images/affirm.png" class="mb-2" style="height:30px;">
                                <button class="btn btn-danger w-100">Pay with Affirm</button>
                                <small class="text-muted d-block mt-1">Credit option available.</small>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-100 mt-2 fw-semibold" style="background:#0d2c6c;">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    {{--  --}}
    
<!-- END: Content-->
@endsection


@push('script')
<script>
    //for country phone code
    $(document).ready(function() {
        let storedCountryId = localStorage.getItem('selected_country_id');

        if (storedCountryId) {
            $(".phone-flag option").each(function() {
                if ($(this).data("id") == storedCountryId) {
                    $(this).prop("selected", true);
                }
            });
        }

        $('.phone-flag').select2();
    });

// for auto-select currency
    $(document).ready(function() {
    // On change of country code
    $('.phone-flag').on('change', function() {
        let currency = $(this).find(':selected').data('currency');
        $('#currency').val(currency);
    });

    // Trigger change once on page load (so default selection also works)
    $('.phone-flag').trigger('change');
    });
</script>
@endpush 

@push('style')
<style>
    span.select2-selection.select2-selection--single {
        border: none !important;
        border-bottom: 1px solid #ccc !important;
        height: 41px !important;
        padding-top: 7px;
        margin-top: 5px;
        border-radius: 0 !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 10px !important;
    }
</style>
@endpush