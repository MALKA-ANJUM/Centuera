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
                <form action="" method="POST">
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
                        <div id="courseRepeater" class="col-md-6">
                            <div class="col-11 mb-2">
                                <label class="form-label fw-semibold">Course <span class="text-danger">*</span></label>
                                <select class="form-select select2 courseSelect" name="courses[]">
                                    <option value="">Select course</option>
                                </select>
                            </div>
                            {{-- <div class="removeCourse text-danger col-md-1" style="cursor: pointer">X</div> --}}
                            {{-- <div class="col-md-2 d-flex align-items-end">
                                <button type="button" class="btn btn-danger removeCourse">X</button>
                            </div> --}}
                        </div>
                        <div class="col-6"></div>
                        <div class="col-6 d-flex align-items-end">
                            <button type="button" id="addCourse" class="btn btn-primary w-100 fw-semibold" style="background:#0d2c6c;">
                                Add +
                            </button>
                        </div>

                        <div class="row">
                            <!-- Currency -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Currency <span class="text-danger">*</span></label>
                                <input type="text" name="currency" id="currency" value="USD" class="form-control" readonly>
                            </div>

                            <!-- Total Amount -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Total Amount <span class="text-danger">*</span></label>
                                <input type="text" name="amount" class="form-control" placeholder="Total Amount">
                                @error('amount')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Workshop Date -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Workshop Date</label>
                            <input type="text" name="date" class="form-control datepicker" placeholder="dd-mm-yyyy,dd-mm-yyyy">
                        </div>
                    </div>

                    <!-- Payment Options -->
                    <div class="row text-center mt-4 g-3">
                        <div class="col-md-3">
                            <div class="p-3 border rounded-3 shadow-sm">
                                <img src="/images/stripe.png" class="mb-2" style="height:30px;">
                                <button type="button" class="btn btn-danger w-100" id="payWithStripe">Pay with Stripe</button>
                                <small class="text-muted d-block mt-1">Major Credit / Debit Cards accepted.</small>
                            </div>
                        </div>
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
    // $('.phone-flag').on('change', function() {
    //     let currency = $(this).find(':selected').data('currency');
    //     $('#currency').val(currency);
    // });

    // Trigger change once on page load (so default selection also works)
    $('.phone-flag').trigger('change');
    });

    //SHOW COURSE USING AJAX
    $(document).ready(function () {
        let courseOptions = '<option value="">Select course</option>';

        // Load courses via AJAX once
        $.ajax({
            url: "{{ route('get.courses') }}",
            type: "GET",
            success: function(courses) {
                $.each(courses, function(index, course) {
                    courseOptions += '<option value="'+course.id+'">'+course.title+'</option>';
                });

                // Fill the first dropdown
                $(".courseSelect").html(courseOptions).select2();
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });

        // Add new repeater row
        $("#addCourse").click(function () {
            let newRow = `
            <div class="course-item row mb-2">
                <div class="col-md-11">
                    <select class="form-select select2 courseSelect" name="courses[]">
                        ${courseOptions}
                    </select>
                </div>
                <div class="removeCourse text-danger col-md-1" style="cursor: pointer">X</div>
            </div>`;

            $("#courseRepeater").append(newRow);

            // Reinitialize select2 for the new dropdown
            $("#courseRepeater .select2").last().select2();
        });

        // Remove row
        $(document).on("click", ".removeCourse", function () {
            $(this).closest(".course-item").remove();
        });
    });

    //flatpickr
    document.addEventListener('DOMContentLoaded', function () {
        flatpickr(".datepicker", {
            mode: "range",
            dateFormat: "d-m-Y",
            // defaultDate: ["2016-10-10", "2016-10-20"]
        });
    });
</script>

<script src="https://js.stripe.com/v3/"></script>
<script>
    $(document).ready(function () {
        let stripe = Stripe("{{ config('services.stripe.key') }}"); // ✅ your publishable key

        $("#payWithStripe").click(function (e) {
            e.preventDefault();

            let valid = true;
            let errors = [];

            // Required fields
            let name = $("input[name='name']").val().trim();
            let email = $("input[name='email']").val().trim();
            let phone = $("input[name='phone']").val().trim();
            let country_code = $("select[name='country_code']").val();
            let amount = $("input[name='amount']").val().trim();
            let courses = $("select[name='courses[]']").map(function(){ return $(this).val(); }).get();

            // Validation checks
            if (!name) { valid = false; errors.push("Name is required"); }
            if (!email) { valid = false; errors.push("Email is required"); }
            if (!phone) { valid = false; errors.push("Phone number is required"); }
            if (!country_code) { valid = false; errors.push("Country code is required"); }
            if (!amount || isNaN(amount) || amount <= 0) { valid = false; errors.push("Valid amount is required"); }
            if (courses.length === 0 || !courses[0]) { valid = false; errors.push("At least one course must be selected"); }

            // Show error messages
            if (!valid) {
                alert("Please fix the following errors:\n\n" + errors.join("\n"));
                return false; // ⛔ Stop before Stripe request
            }

            // ✅ Proceed only if valid
            let formData = {
                _token: "{{ csrf_token() }}",
                fullname: name,
                email: email,
                phone: phone,
                country_code: country_code,
                course_id: courses,
                currency: $("#currency").val(),
                total_amount: amount,
                workshop_start_date: $("input[name='date']").val().split(',')[0] ?? null,
                workshop_end_date: $("input[name='date']").val().split(',')[1] ?? null,
                participants: 1,
                price: amount
            };

            $.ajax({
                url: "{{ route('checkout.session') }}",
                method: "POST",
                data: formData,
                success: function (response) {
                    if (response.id) {
                        stripe.redirectToCheckout({ sessionId: response.id });
                    } else {
                        alert("Payment initialization failed.");
                    }
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                    alert("Error: Unable to initialize payment.");
                }
            });
        });

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