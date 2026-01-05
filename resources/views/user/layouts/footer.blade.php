    @php
        $generalSetting = App\Models\Generalsettings::first();
        $courses =App\Models\Course::select('id', 'title')->orderBy('title', 'asc')->get();
        $countries = App\Models\Country::all();
    @endphp
    <!-- END: Content-->
    <div id="sticky-footer">
        <div class="container">
            <div class="sticky-footer-inner-content d-flex justify-content-between">
                <div class="request-call" id="callbackBtn" style="cursor: pointer;">
                    <span class="call-symbol"><i class="ri-smartphone-line"></i></span>
                    <span class="phone-number">Request a callback</span>
                </div>

                <div class="call-us-on">
                    <span class="call-symbol"><i class="ri-phone-line"></i></span>
                    <a href="#" class="phone-number" id="dynamic-country-phone">Call us on {{ $generalSetting->mobile }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Section Start -->
    <div class="footer-area ft-bg">
        <div class="footer-widget-info pb-2">
            <div class="container">
                <div class="row text-white">
                    <div class="col-md-3 mt-4 col-6">
                        <div style="width: 50%;" class="text-center">
                            <div class="d-flex justify-content-center">
                                <span class="fi fi-us font-large-1"></span>
                                <p class="mb-1 ms-2">USA</p>
                            </div>
                            <p class="mb-0 text-nowrap"><a href="tel:+17139009707" class="text-white">+1 713 900 9707</a></p>
                        </div>
                    </div>
                        <div class="col-md-3 mt-4 col-6">
                            <div style="width: 50%;" class="text-center">
                            <div class="d-flex justify-content-center">
                            <span class="fi fi-ca font-large-1"></span>
                            <p class="mb-1 ms-2">Canada</p>
                        </div>
                        <p class="mb-0 text-nowrap"><a href="tel:+17139255626" class="text-white">+1 713 925 5626</a></p>
                            </div>
                    </div>
                        <div class="col-md-3 mt-4 col-6">
                            <div style="width: 50%;" class="text-center">
                            <div class="d-flex justify-content-center">
                            <span class="fi fi-gb font-large-1"></span>
                            <p class="mb-1 ms-2">UK</p>
                        </div>
                        <p class="mb-0 text-nowrap"><a href="tel:+447476975480" class="text-white">+44 747 697 5480</a></p>
                            </div>
                    </div>
                    <div class="col-md-3 mt-4 col-6">
                            <div style="width: 50%;" class="text-center">
                            <div class="d-flex justify-content-center">
                            <span class="fi fi-au font-large-1"></span>
                            <p class="mb-1 ms-2">Australia</p>
                        </div>
                        <p class="mb-0 text-nowrap"><a href="tel:+61261528662" class="text-white">+61 261 528 662</a></p>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-md-6">
                        <div class="footer-widget info-web">
                            <div class="image">
                                <a class="text-decoration-none" href="{{ route('index') }}">
                                    <img src="{{ asset('admin/generalSetting/' . $generalSetting->logo )}}" alt="image"
                                        style="width: 200px;">
                                </a>
                            </div>
                            <p class="pra-light mb-30">Consulting is a dynamic and multifaceted field
                                that involves providing expert advice and
                                guidance to individuals,</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-md-6">
                        <div class="footer-widget">
                            <h4 class="text-white">Quick Links</h4>
                            <ul>
                                <li><a href="{{ route('about') }}">About Company</a></li>
                                <li><a href="/terms-conditions">Terms & Conditions</a></li>
                                <li><a href="/privacy-policy">Privacy Policy</a></li>
                                <li><a href="/refund-policy">Refund Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="footer-widget ml-70">
                            @php 
                                $categories = App\Models\Category::where('features', 1)->get();
                            @endphp
                            <h4 class="text-white">Categories</h4>
                            <ul>
                                @if(count($categories) > 0)
                                    @foreach($categories as $index => $category)
                                        <li><a href="{{ route('course.list', ['category' => $category->id]) }}">{{ $category->name	}}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="footer-widget">
                            <h4 class="text-white">Get Our Weeekly Newsletter</h4>
                                <form id="subscribeForm" class="subscribe-from d-flex align-items-center rounded" style="background-color: #0076b1;">
                                <input class="from-control p-2" type="email" id="emailInput" style="width: 70%;" placeholder="type your email address" required>
                                <button class="btn text-white p-2" type="submit">Subscribe</button>
                            </form>
                            <div id="subscribeMessage" style="margin-top:10px;"></div>
                    
                            <div class="contact-item">
                                <div class="payment-info my-4">
                                    <h6>Follow Us</h6>
                                </div>
                                <div class="cpr-right">
                                    <a href="{{ $generalSetting->facebook }}" target="_blank">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                    <a href="{{ $generalSetting->instagram }}" target="_blank">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                    <a href="{{ $generalSetting->twitter }}" target="_blank">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                    <a href="{{ $generalSetting->linkedin }}" target="_blank">
                                        <i class="ri-linkedin-fill"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="payment-info mt-4">
                                    <h6>We Accept</h6>
                                </div>
                                <div class="payment-gateway d-block mt-2 rounded-0">
                                    <img src="{{ asset('frontend-assets/payment-logo/paypal.png')}}" alt="paypal" width="27%">
                                    <img src="{{ asset('frontend-assets/payment-logo/VISA.png')}}" alt="visa" width="27%">
                                    <img src="{{ asset('frontend-assets/payment-logo/Stripe.png')}}" alt="stripe" width="27%">
                                    <img src="{{ asset('frontend-assets/payment-logo/American-Express.png')}}" alt="american-express" width="35%">
                                    <img src="{{ asset('frontend-assets/payment-logo/mastercard.png')}}" alt="mastercard" width="35%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="d-flex justify-content-center disclaimer">
                    <div class="accordion accordion-flush bg-transparent" id="accordionFlushExample">
                        <div class="accordion-item bg-transparent">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed w-auto mx-auto p-1" type="button" 
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#flush-collapseOne" 
                                        aria-expanded="false" 
                                        aria-controls="flush-collapseOne">
                                    Disclaimer
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" 
                                aria-labelledby="flush-headingOne" 
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body text-white">
                                    <ul>
                                        <li>
                                            PMP, PMI, PMBOK, CAPM, PgMP, PfMP, ACP, PBA, RMP, and SP are all registered trademarks of the Project Management Institute, Inc.
                                        </li>
                                        <li>
                                            CBAP® is a registered trademark of IIBA.
                                        </li>
                                        <li>
                                            ITIL® is a registered trademark of AXELOS Limited, utilized with permission from AXELOS Limited. The Swirl logoTM is a trademark of AXELOS Limited, also used with permission from AXELOS Limited. All rights reserved.
                                        </li>
                                        <li>
                                            PRINCE2® is a registered trademark of AXELOS Limited, used with permission from AXELOS Limited. The Swirl logoTM is a trademark of AXELOS Limited, used under permission from AXELOS Limited. All rights reserved.
                                        </li>
                                        <li>
                                            Certified ScrumMaster® (CSM) and Certified Scrum Trainer® (CST) are registered trademarks of SCRUM ALLIANCE®.
                                        </li>
                                        <li>
                                            Professional Scrum Master is a registered trademark of Scrum.org.
                                        </li>
                                        <li>
                                            The APMG-International Finance for Non-Financial Managers and the Swirl Device logo are trademarks of The APM Group Limited.
                                        </li>
                                        <li>
                                            The Open Group® and TOGAF® are trademarks of The Open Group.
                                        </li>
                                        <li>
                                            IIBA®, the IIBA® logo, BABOK®, and Business Analysis Body of Knowledge® are registered trademarks owned by the International Institute of Business Analysis.
                                        </li>
                                        <li>
                                            CBAP® is a registered certification mark owned by the International Institute of Business Analysis. Certified Business Analysis Professional, EEP, and the EEP logo are trademarks owned by the International Institute of Business Analysis.
                                        </li>
                                        <li>
                                            COBIT® is a trademark of ISACA® registered in the United States and other countries.
                                        </li>
                                        <li>
                                            CISA® is a registered trademark of the Information Systems Audit and Control Association (ISACA) and the IT Governance Institute.
                                        </li>
                                        <li>
                                            CISSP® is a registered mark of The International Information Systems Security Certification Consortium ((ISC)2).
                                        </li>
                                        <li>
                                            CompTIA A+, CompTIA Network+, and CompTIA Security+ are registered marks of CompTIA Inc.
                                        </li>
                                        <li>
                                            CISCO®, CCNA®, and CCNP® are trademarks of Cisco and are registered trademarks in the United States and certain other countries.
                                        </li>
                                        <li>
                                            CSM®, CSPO®, CSD®, CSP®, A-CSPO®, and A-CSM® are registered trademarks of Scrum Alliance®.
                                        </li>
                                        <li>
                                            TOGAF® is a registered trademark of The Open Group in the U.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="copy-right-area">
            <div class="container">
                <div class="cpr-left text-center">
                    <p class="">Copyright @ 2014-2025 Centura America's Inc All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Section End -->
    <!-- Request Callback Trigger -->
    <div class="request-call">
        <a href="javascript:void(0)" id="callbackBtn" class="d-flex align-items-center text-decoration-none" style="cursor: pointer;">
            <span class="call-symbol"><i class="ri-smartphone-line"></i></span>
            <span class="phone-number">Request a callback</span>
        </a>
    </div>

    <!-- Modal -->
    <div id="callbackModal" class="modal callbackmodal" style="display: none;">
        <div class="modal-content overflow-hidden">
            <div class="modal-body p-0">
                <!-- Left: Image -->
                <div class="modal-image d-none d-md-block">
                        <div class="desc p-4 pb-0">
                            <h3 class="text-center" style="color: #012833">Being Friends & Colleagues</h3>
                            <p class="fw-bold text-center" style="color: #012833">Avail Group Discount</p>
                            <ul class="text-white ps-0" style="list-style: none;" >
                                <div class="d-flex" style="color: #012833">
                                    <i class="ri-arrow-right-s-fill ms-0"></i><li> Enroll with your groups or friends</li>
                                </div>
                                <div class="d-flex" style="color: #012833">
                                    <i class="ri-arrow-right-s-fill ms-0"></i><li> Get details on our social group enrollment pricing</li>
                                </div>
                                <div class="d-flex" style="color: #012833">
                                    <i class="ri-arrow-right-s-fill ms-0"></i><li> Group learning boosts completion rates by 30% and improves outcomes</li>
                                </div>
                            </ul>
                        </div>
                    <img src="{{ asset('frontend-assets/img/all-img/call_center.png') }}" alt="Request Callback">
                </div>
                <!-- Right: Form -->
                <div class="modal-form py-3 pe-4 mt-3">
                    <span class="close" id="closeModal">&times;</span>
                    <h4 class="border-bottom">Request a Callback</h4>
                    <form action="{{route('request.callback')}}" method="POST" class="mt-5">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Name *" required>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <select name="country_code" id="phone-flag" class="form-select select2" required>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->phonecode }}" data-flag='{!! $country->flag !!}' data-id="{{ $country->id }}">
                                            +{{ $country->phonecode }} {!! $country->flag !!}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="text" 
                                    id="phone" 
                                    name="phone" 
                                    class="form-control ps-2" 
                                    placeholder="9090909090" 
                                    required 
                                    maxlength="10"
                                    oninput="restrictToNumbers(this)" 
                                    autocomplete="tel">
                            </div>
                        </div>

                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email *">
                        </div>

                        <div class="mb-3">
                            <select name="course_id" id="course_id" class="form-control select2" required>
                                <option value="">Select Program</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="policy" name="policy" required>
                            <label class="form-check-label" for="policy">
                                By providing your contact details, you agree to our 
                                <a href="/privacy-policy" target="_blank">Privacy Policy</a>.
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit Request</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Simple modal background -->
    <style>
        .callbackmodal {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            display: none;
            align-items: center;
            justify-content: center;
        }

        .callbackmodal .modal-content {
            width: 90%;
            max-width: 800px; 
            background: #fff;
            /* padding: 25px 20px; */
            border-radius: 8px;
            position: relative;
        }

        .callbackmodal .close {
            position: absolute;
            right: 12px;
            top: 6px;
            font-size: 24px;
            cursor: pointer;
        }

        .callbackmodal .modal-body {
            display: flex;
            flex-direction: row;
            gap: 20px;
        }

        .callbackmodal .modal-image {
            flex: 1;
           
            background-color: #79CAF6;
        }

        .callbackmodal .modal-image img {
            /* border-radius: 8px; */
            max-width: 100%;
            max-height: 320px;
            object-fit: cover;
        }

        .callbackmodal .modal-form {
            flex: 1;
        }
        .callbackmodal .select2-container .select2-selection--single{
            height: 37px;
        }
        .callbackmodal .select2-container--default .select2-selection--single{
            border: 0;
            border-bottom: 1px solid #aaa;
            border-radius: 0;
        }

        /* Mobile responsive */
        @media (max-width: 768px) {
            .callbackmodal .modal-body {
                flex-direction: column;
                width: 100%;
                left: 8px;
            }
            .callbackmodal .modal-image {
                display: block;              
                width: 100%; 
                margin-bottom: 15px;         
            }
            .callbackmodal .modal-image img {
                width: 100%;
                max-height: 200px;           
                object-fit: cover;
                border-radius: 8px;
            }
        }
        .footer-widget-info .footer-widget .country ul li {
            color: #000;
        }
         .footer-widget-info .footer-widget .country ul li:hover {
            color: #fff;
        }
        .footer-widget-info .footer-widget .country ul li:hover::after{
            width: 0px !important;
        }
        .footer-widget-info .footer-widget .country ul li:hover{
            padding-left: 0px !important;
        }
        .footer-widget-info .footer-widget .country ul li {
            margin-bottom: 0px;
            line-height: 17px;
        } 
    </style>

    <!-- callback Script -->
    <script>
        $(document).ready(function () {
            // Open modal
            $("#callbackBtn").on("click", function () {
                $("#callbackModal").css("display", "flex");
            });

            // Close modal on X button
            $("#closeModal").on("click", function () {
                $("#callbackModal").hide();
            });

            // Close modal when clicking outside
            $(window).on("click", function (e) {
                if ($(e.target).is("#callbackModal")) {
                    $("#callbackModal").hide();
                }
            });
            let storedCountryId = localStorage.getItem('selected_country_id');

            if (storedCountryId) {
                $("#phone-flag option").each(function() {
                    if ($(this).data("id") == storedCountryId) {
                        $(this).prop("selected", true);
                    }
                });
            }

            // Initialize Select2 after setting the value
            $('#phone-flag').select2();
        });
    </script>

    <!-- Back to Top -->
    <button type="button" id="backtotop" class="position-fixed text-center border-0 p-0">
        <i class="ri-arrow-up-s-line"></i>
    </button>
    <!-- Link of JS files -->
    <script src="{{ asset('frontend-assets/js/jquery.mixitup.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('frontend-assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('frontend-assets/js/range-slider.min.js')}}"></script>
    <script src="{{ asset('frontend-assets/js/magnific-popup.min.js')}}"></script>
    <script src="{{ asset('frontend-assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('frontend-assets/js/carousel-thumbs.min.js')}}"></script>
    <script src="{{ asset('frontend-assets/js/main.js')}}"></script>
    <script src="{{ asset('frontend-assets/js/chatbot.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="{{asset('app-assets/js/scripts/forms/form-select2.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    @stack('script')
    <script>
        var countryPhones = @json($generalSetting && $generalSetting->country_rule ? collect(json_decode($generalSetting->country_rule, true))->mapWithKeys(function($row) { return [$row['country_id'] => $row['phone']]; }): []);
        var usCountryId = @json(optional(App\Models\Country::where('name', 'United States')->first())->id);
        var ukCountryId = @json(optional(App\Models\Country::where('name', 'United Kingdom')->first())->id);
        var defaultMobile = @json($generalSetting->mobile);
        var sessionCountryId = @json(session('country_id')); // assuming you store this in session

        $(document).ready(function () {
            function updatePhoneLink() {
                var selectedCountryId = localStorage.getItem('selected_country_id') || sessionCountryId || null;
                var phone = countryPhones[selectedCountryId] || null;

                var $phoneLink = $('#dynamic-country-phone');
                var $contactPhone = $('.contact-item .content a[href^="tel:"]');

                // If no country selected or invalid → fallback to general setting
                if (!selectedCountryId || (!phone && selectedCountryId != usCountryId && selectedCountryId != ukCountryId)) {
                    $phoneLink.text('Call us on ' + defaultMobile).attr('href', 'tel:+' + defaultMobile);
                    $contactPhone.text(defaultMobile).attr('href', 'tel:+' + defaultMobile);
                    return;
                }

                // US / UK → general setting mobile
                if (selectedCountryId == usCountryId || selectedCountryId == ukCountryId) {
                    $phoneLink.text('Call us on ' + defaultMobile).attr('href', 'tel:+' + defaultMobile);
                    $contactPhone.text(defaultMobile).attr('href', 'tel:+' + defaultMobile);
                }
                // Other countries → use country-specific phone
                else if (phone) {
                    $phoneLink.text('Call us on ' + phone).attr('href', 'tel:+' + phone);
                    $contactPhone.text(phone).attr('href', 'tel:+' + phone);
                }
            }

            // Initial run on page load
            updatePhoneLink();

            // Update instantly when dropdown changes
            $(document).on('change', '.country-select', function () {
                var selectedVal = $(this).val();
                localStorage.setItem('selected_country_id', selectedVal || '');
                updatePhoneLink();
            });
        });
    </script>

    <script>
        $(document).ready(function () { 
            //  let storedCountryIso = localStorage.getItem('detected_country_iso');
            // var countryId = localStorage.getItem('selected_country_id') || 0;s

            $.ajax({
                url: '{{ route("get.countries") }}',
                type: 'GET',
                success: function (countries) {
                    detectCountryByIP(countries);
                    
                },
                error: function () {
                    console.error('Failed to load countries list');
                }
            });

            function showFlag(country) { 
                let flagClass = `fi fi-${country.iso2.toLowerCase()} font-large-1`;
                $('#flag-display').attr('class', 'select__flag ' + flagClass);
                localStorage.setItem('detected_country_iso', country.iso2);
                localStorage.setItem('selected_country_id', country.id);

                $.ajax({
                    url: '{{ route("user.set.country") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        country_id: country.id
                    },
                    success: function(response) {
                        console.log("Country stored in session:", response);
                    }
                });
            }

            function detectCountryByIP(countries) {
                $.get('https://ipapi.co/json/', function (data) {
                    // Match by ISO code instead of name
                    let matched = countries.find(
                        c => c.iso2.toLowerCase() === data.country_code.toLowerCase()
                    );

                    if (matched) {
                        showFlag(matched);
                    } else {
                        console.warn('Country not found in database list');
                    }
                }).fail(function () {
                    console.error('IP lookup failed');
                });
            }

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#searchCourse').on('input', function() {
                let query = $(this).val();

                if (query.length < 3) {
                    $('#courseDropdown').hide();
                    return;
                }

                $.ajax({
                    url: "{{ route('user.search.course') }}",
                    data: {
                        q: query
                    },
                    success: function(data) {
                        let dropdown = $('#courseDropdown');
                        dropdown.empty();

                        if (data.length === 0) {
                            dropdown.hide();
                            return;
                        }

                        // Append course links
                        data.forEach(function(course) {
                            dropdown.append(
                                `<a href="/course-details/${course.slug}" style="display:block; padding: 8px 12px; cursor:pointer; color:#333; text-decoration:none;">${course.title}</a>`
                            );
                        });

                        dropdown.show();
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error:', error);
                    },
                });
            });

            // Fill input on course click & hide dropdown
            $(document).on('click', '#courseDropdown a', function(e) {
                $('#searchCourse').val($(this).text());
                $('#courseDropdown').hide();
            });

            // Hide dropdown when clicking outside
            $(document).click(function(e) {
                if (!$(e.target).closest('.dropdown').length) {
                    $('#courseDropdown').hide();
                }
            });
        });
    </script>
    
    <script>
        $(document).ready(function() {  
            $('#subscribeForm').on('submit', function(e) {
                e.preventDefault();

                let email = $('#emailInput').val();

                $.ajax({
                    url: "{{ route('subscribe') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        email: email
                    },
                    success: function(response) {
                        $('#subscribeMessage').html('<span style="color:green;">' + response.message + '</span>');
                        $('#emailInput').val('');
                    },
                });
            });
        });

        // common function called everywhere 
        function restrictToNumbers(input) {
            input.value = input.value.replace(/[^0-9]/g, '');
        }

        $('.modal-phone-flag').select2({
            dropdownParent: $('#contactUsModal')
        });
    </script>

    <script>
        $(document).ready(function () {
            // Check if 'visited' key is NOT in localStorage
            if (!localStorage.getItem("visited")) {
                // Show the modal
                var welcomeModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
                welcomeModal.show();

                // Set 'visited' in localStorage so it won't show next time
                localStorage.setItem("visited", "true");
            }
        });
    </script>   
    <script>
        document.querySelectorAll('.category-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                document.querySelectorAll('.courses-content').forEach(c => c.style.display = 'none');
                document.getElementById(this.dataset.category).style.display = 'block';
            });
        });

    </script>
    </body>
    <script>
        'undefined' === typeof _trfq || (window._trfq = []);
        'undefined' === typeof _trfd && (window._trfd = []), _trfd.push({
            'tccl.baseHost': 'secureserver.net'
        }, {
            'ap': 'cpbh-mt'
        }, {
            'server': 'p3plmcpnl509681'
        }, {
            'dcenter': 'p3'
        }, {
            'cp_id': '10299725'
        }, {
            'cp_cl': '8'
        }) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryItems = document.querySelectorAll('.category-item');
            categoryItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    const target = this.getAttribute('data-category');
                    const accTarget = 'acc-' + target.split('-')[1];

                    // Remove active class from all
                    document.querySelectorAll('.category-item').forEach(el => el.classList.remove('active'));
                    document.querySelectorAll('.courses-content').forEach(el => el.style.display = 'none');
                    document.querySelectorAll('.accreditation-content').forEach(el => el.style.display = 'none');

                    // Show selected
                    this.classList.add('active');
                    document.getElementById(target).style.display = 'block';
                    document.getElementById(accTarget).style.display = 'block';
                });
            });
        });
    </script>
    <script src='https://img1.wsimg.com/signals/js/clients/scc-c2/scc-c2.min.js'></script>
    <!-- Mirrored from centuera.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Jul 2025 10:40:45 GMT -->

</html>