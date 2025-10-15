@extends('user.layouts.layout')
@section('title', 'Order Summary')
@section('content')

<section class="course-container-pmp py-5">
    <div class="container">
        <!-- Title -->
        <div class="">
        </div>

        <div class="row g-4">
            <!-- Course Details Card -->
            <div class="col-md-8">
                <h2 class="fw-bold checkout-title">Checkout</h2>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item bg-white shadow-sm rounded card w-100 mw-100">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Course Details
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="d-flex justify-content-between align-items-end gap-3">
                                    <div class="gap-3 d-flex align-items-start">
                                        @if($schedule->getCourse != null)
                                        <div class="border border-1 rounded-3 p-2">
                                            <img class="" width="60px" height="60px" src="{{ asset('uploads/certifications/'. $schedule->getCourse->certification_image) }}" alt="Course Logo">
                                        </div>
                                        @endif
                                        <div class="details">
                                            <h4 class="lh-base fs-6 fw-bold mt-2 mb-0 me-2 checkout-card-title"> {{ $schedule->getCourse->title }}</h4>
                                            <div class="fs-7 fw-semibold"><i class="ri-calendar-event-line me-2"></i><span class="text-black fw-normal">{{ $schedule->start_date }} - {{ $schedule->end_date }}</span><span class="text-black fw-normal"> • ({{ $schedule->total_days_of_training }} Days)</span></div>
                                            <div class="fs-7 fw-normal"><i class="ri-time-line me-2"></i>
                                                <span class="text-black fw-normal">
                                                    @php
                                                    $timezones = json_decode($schedule->country->timezones, true);
                                                    @endphp
                                                    {{ $timezones[0]['abbreviation'] }}
                                                </span>
                                                <span class="text-black fw-normal"> • {{ date("g:i A", strtotime($schedule->starttime)) }} - {{ date("g:i A", strtotime($schedule->end_time)) }} </span>
                                            </div>
                                            <div class="fs-7 fw-semibold">
                                                <i class="ri-user-3-line me-2"></i>
                                                <span class="text-black fw-normal">No. of participants</span>
                                                <span class="text-black fw-normal" id="participants-count"> • 1</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-none d-lg-block">
                                        <div class="quantity-selector d-flex justify-content-center align-items-center rounded-5 border border-2">
                                            <button class="btn decrement me-0 mb-0" type="button" disabled>−</button>
                                            <input type="text" id="participant-input" class="border border-1 rounded-3 fs-7 fw-semibold" value="1" readonly style="width: 50px; text-align: center">
                                            <button class="btn increment ms-0" type="button">+</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="#" id="continueStep1" class="sticky-button fs-6 fw-semibold d-lg-flex justify-content-center mt-3 checkpay w-25 px-1 py-2 rounded-2 p-1 text-white bg-primary">
                                        Continue
                                        <i class="ri-arrow-right-s-line d-block ms-1 me-0"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-white shadow-sm rounded card w-100 mw-100">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Learner Details
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <!-- Full Name -->
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control border rounded px-3" placeholder="Full Name*" value="{{ trim((auth()->user()->first_name ?? '') . ' ' . (auth()->user()->last_name ?? '')) }}" required>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <input type="email" class="form-control border rounded px-3" placeholder="Email*" name="email" value="{{ auth()->user()->email ?? '' }}" required>
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group border rounded overflow-hidden border-bottom-0">
                                                <select name="country_code" class="phone-flag form-select rounded-start-3 me-0 select2" required>
                                                    @foreach($countries as $country)
                                                    <option
                                                        value="{{ $country->phonecode }}"
                                                        data-flag='{!! $country->flag !!}'
                                                        data-id="{{ $country->id }}">
                                                        +{{ $country->phonecode }} {!! $country->flag !!}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <input type="text" class="form-control p-0 ps-2 my-0" id="phone" name="phone" placeholder="Phone Number*" value="{{ auth()->user()->mobile ?? '' }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- City -->
                                    <div class="col-md-6">
                                        <input type="text" class="form-control border rounded px-3" placeholder="Enter City Name" name="city">
                                    </div>

                                    <!-- Referral Code -->
                                    <!-- <div class="col-md-6">
                                        <input type="text" class="form-control border rounded px-3" placeholder="Referral Code (optional)">
                                    </div> -->

                                    <!-- Add Alternative Contact Button -->
                                    <!-- <div class="col-md-6">
                                        <button type="button" id="toggleAltBtn" class="btn w-100 p-0">
                                            <i class="ri-add-circle-line me-1"></i> Add Alternative Contact
                                        </button>
                                    </div> -->

                                    <!-- Alternative Contact (Hidden by default) -->
                                    <!-- <div id="altContact" class="row g-3 d-none mt-2">
                                        <div class="col-md-6">
                                            <input type="email" class="form-control border rounded px-3" placeholder="Alternative Email*">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <select name="country_code" class="phone-flag form-select rounded-start-3 me-0 select2" required>
                                                        @foreach($countries as $country)
                                                        <option
                                                            value="{{ $country->phonecode }}"
                                                            data-flag='{!! $country->flag !!}'
                                                            data-id="{{ $country->id }}">
                                                            +{{ $country->phonecode }} {!! $country->flag !!}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" class="form-control p-0 ps-2 my-0" id="phone" name="phone" placeholder="Phone Number*" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <!-- Privacy Checkbox -->
                                    <!-- <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="privacyCheck">
                                            <label class="form-check-label" for="privacyCheck">
                                                By providing your contact details you agreed to our
                                                <a href="#" class="fw-bold">Privacy and Policy</a>.
                                            </label>
                                        </div>
                                    </div> -->
                                </div>

                                <!-- Submit Button -->
                                <div class="d-flex justify-content-end">
                                    <a href="#" id="continueStep2"
                                        class="sticky-button fs-6 fw-semibold d-lg-flex justify-content-center mt-3 checkpay w-25 px-1 py-2 rounded-2 text-white bg-primary">
                                        Continue
                                        <i class="ri-arrow-right-s-line d-block ms-1 me-0"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-white shadow-sm rounded card w-100 mw-100">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Secure Payment
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="bg-white h-100 shadow-sm border rounded-3 p-3 py-4">
                                            <div class="card-body text-center checkpaycardsiz p-0">
                                                <img src="{{ asset('frontend-assets/img/all-img/stripe-img.png') }}" width="82" height="48" alt="Stripe">
                                                <p class="my-1 fs-6 fw-semibold">Credit / Debit Cards accepted</p>
                                                <p class="text-muted small mt-3 text-center">You will be charged <span class="text-dark fw-semibold total-pay-amount">INR 20,219.30</span> on your payment card through Stripe.</p>
                                                <form action="{{ route('checkout.session') }}" method="POST">
                                                    @csrf
                                                    <button id="payWithStripe" value="stripe" type="submit" class=" w-100 bg-primary text-center rounded-3 p-2 text-white fs-6 fw-semibold border-0 my-2"><a rel="nofollow" data-bs-toggle="" data-bs-target="#checksuccuesspop">Pay with Stripe<i class="ri-checkbox-circle-line ms-2"></i></a></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-md-4">
                <h2 class="fw-bold">Order Summary</h2>
                <div class="card">
                    <div class="card-body">
                        @php
                            $original = $schedule->prices->original_price ?? 0;
                            $discount = $schedule->prices->discount_price ?? 0;
                            $percentOff = ($original > 0)
                                ? round((($original - $discount) / $original) * 100)
                                : 0;

                            $currencySymbol = ($schedule->prices && $schedule->prices?->country_id == 0) || $schedule->prices == null
                                ? 'USD '
                                : $currency;
                        @endphp

                        <p class="mb-1">Price (<span id="item-count">1</span> item)</p>
                        <h2 class="mb-0">
                            {{ $currencySymbol }}<span id="discount-price">{{ $discount }}</span>
                        </h2>
                        <del>
                            {{ $currencySymbol }}<span id="original-price">{{ $original }}</span>
                        </del>
                        <small class="text-success">
                            <i class="ri-coupon-line"></i><span id="percent-off">{{ $percentOff }}</span>% OFF
                        </small>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Subtotal</span>
                                <strong>{{ $currencySymbol }}<span id="subtotal">{{ $discount }}</span></strong>
                            </li>
                        </ul>

                        <div class="d-flex justify-content-between border-top pt-3">
                            <strong>Total</strong>
                            <strong class="text-success">{{ $currencySymbol }}<span id="total">{{ $discount }}</span></strong>
                        </div>
                    </div>
                </div>
                <!-- <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="coupon-header fs-6 fw-semibold me-1 mb-2">Coupon Code</h5>
                        <form action="">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" placeholder="Apply a Code">
                                    <button class="btn btn-primary mb-0">Apply</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>

@endsection


@push('style')
<style>
    .course-container-pmp {
        background: #f8f9fa;
        min-height: 100vh;
    }

    .card {
        transition: all 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    span.select2-selection.select2-selection--single {
        border: none !important;
        border-bottom: 1px solid #ccc !important;
        height: 38px !important;
        padding-top: 3px;
        padding-left: 5px;
        /* margin-top: 5px; */
        border-radius: 0 !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 10px !important;
    }

    .modal span.select2-selection.select2-selection--single {
        width: 75px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 5px !important;
    }
</style>
@endpush

@push('script')
<script>
    $(document).ready(function() {
        $("#toggleAltBtn").on("click", function() {
            $("#altContact").toggleClass("d-none");

            if ($("#altContact").hasClass("d-none")) {
                $(this).html('<i class="ri-add-circle-line me-1"></i> Add Alternative Contact');
            } else {
                $(this).html('<i class="ri-close-circle-line me-1"></i> Remove Alternative Contact');
            }
        });
    });


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
$(document).ready(function () {
    // Disable all accordion header clicks initially
    $(".accordion-button").attr("data-bs-toggle", "");

    // Step 1 → Step 2
    $("#continueStep1").on("click", function (e) {
        e.preventDefault();
        if (validateStep1()) {
            // ✅ Re-enable Step 1 accordion button (so user can reopen)
            $("#collapseOne").prev().find(".accordion-button").attr("data-bs-toggle", "collapse");

            // Move to Step 2
            $("#collapseOne").collapse("hide");
            $("#collapseTwo").collapse("show");
        }
    });

    // Step 2 → Step 3
    $("#continueStep2").on("click", function (e) {
        e.preventDefault();
        if (validateStep2()) {
            // ✅ Re-enable Step 2 accordion button
            $("#collapseTwo").prev().find(".accordion-button").attr("data-bs-toggle", "collapse");

            // Move to Step 3
            $("#collapseTwo").collapse("hide");
            $("#collapseThree").collapse("show");
        }
    });

    // Validation for Step 1 (Participants count)
    function validateStep1() {
        let qty = parseInt($("#participant-input").val());
        return qty > 0;
    }

    // Validation for Step 2 (User details)
    function validateStep2() {
        let name = $("input[name='name']").val().trim();
        let email = $("input[name='email']").val().trim();
        let phone = $("input[name='phone']").val().trim();
        return !(name === "" || email === "" || phone === "");
    }
});




    $(document).ready(function() {
        const minCount = 1;
        const maxCount = 50; // you can change max if needed

        $(".increment").click(function() {
            let input = $("#participantCount");
            let value = parseInt(input.val());

            if (value < maxCount) {
                value++;
                input.val(value);
            }
            $(".decrement").prop("disabled", value <= minCount);
        });

        $(".decrement").click(function() {
            let input = $("#participantCount");
            let value = parseInt(input.val());

            if (value > minCount) {
                value--;
                input.val(value);
            }
            $(".decrement").prop("disabled", value <= minCount);
        });
    });

    $(document).ready(function() {
        let discountPrice = parseFloat($("#discount-price").text());
        let originalPrice = parseFloat($("#original-price").text());
        let currency = "{{ $currencySymbol }}";

        function updateSummary(count) {
            let subtotal = discountPrice * count;
            let total = subtotal; // If you want GST or fees, add here

            $("#item-count").text(count);
            $("#subtotal").text(subtotal.toFixed(2));
            $("#total").text(total.toFixed(2));
        }

        $(".increment").click(function() {
            let input = $("#participant-input");
            let value = parseInt(input.val());
            value++;
            input.val(value);
            $("#participants-count").text(" • " + value);
            $(".decrement").prop("disabled", false);
            updateSummary(value);
        });

        $(".decrement").click(function() {
            let input = $("#participant-input");
            let value = parseInt(input.val());
            if (value > 1) {
                value--;
                input.val(value);
                $("#participants-count").text(" • " + value);
                updateSummary(value);
            }
            if (value === 1) {
                $(this).prop("disabled", true);
            }
        });
    });

</script>
@endpush