    @php
        $generalSetting = App\Models\Generalsettings::first();
        $courses =App\Models\Course::select('id', 'title')->orderBy('title', 'asc')->get();
        $countries = App\Models\Country::all();
    @endphp

    <!-- Subscribe Section Start -->
    <div class="subscribe-area position-relative z-1">
        <div class="container">
            <div class="main-max-width">
                <div class="subscribe-info">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="content">
                                <h3 class="fs-20 mb-20">Sign up to get The Latest Updates</h3>
                                <p>Our approach to it is unique around how to work and how to get hands-on with you like
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <form id="subscribeForm" class="subscribe-from d-flex align-items-center">
                                <input class="from-control" type="email" id="emailInput" placeholder="type your email address" required>
                                <button class="btn style-one" type="submit">Subscribe</button>
                            </form>
                            <div id="subscribeMessage" style="margin-top:10px;"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
    <div id="sticky-footer">
        <div class="sticky-footer-inner-content d-flex justify-content-evenly">
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
    <!-- Footer Section Start -->
    <div class="footer-area ft-bg">
        <div class="footer-widget-info pb-5">
            <div class="container">
                <div class="main-max-width">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 col-md-6">
                            <div class="footer-widget info-web">
                                <div class="image">
                                    <a class="text-decoration-none" href="index-2.html">
                                        <img src="{{ asset('admin/generalSetting/' . $generalSetting->logo )}}" alt="image"
                                            style="height:60px; width: 200px;">
                                    </a>
                                </div>
                                <p class="pra-light mb-30">Consulting is a dynamic and multifaceted field
                                    that involves providing expert advice and
                                    guidance to individuals,</p>

                                <a href="{{ route('register') }}" class="btn style-one">Sign Up <img src="{{ asset('frontend-assets/img/icon/long-arrow.svg')}}"
                                        alt="Image"></a>
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
                                    <!-- <li><a href="#">Become an Instructor</a></li> -->
                                </ul>
                            </div>
                            <div class="mt-2">
                                <a href="{{ route('custom.payment') }}" class="btn style-one" style="padding: 10px 15px">Custom CheckOut</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-md-6">
                            <div class="footer-widget ml-70">
                                <h4 class="text-white">Categories</h4>
                                <ul>
                                    <li><a href="pmp_certification.html">PMP® Certification</a></li>
                                    <li><a href="capm_certification.html">CAPM® Certification</a></li>
                                    <li><a href="prince_practice.html">PRINCE2® Foundation</a></li>
                                    <li><a href="lean_green_belt.html">Lean Six Sigma Green Belt</a></li>
                                    <li><a href="lean_black_belt.html">Lean Six Sigma Black Belt</a></li>
                                    <li><a href="pmi_acp_certification.html">PMI-ACP® Certification</a></li>
                                    <li><a href="csm_certification.html">CSM Certification</a></li>
                                    <li><a href="cspo_certification.html">CSPO Certification</a></li>
                                    <li><a href="itil_certification.html">ITIL® Certification</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-md-6">
                            <div class="footer-widget">
                                <h4 class="text-white">Get In Touch</h4>
                                <div class="contact-item d-flex align-items-center country">
                                    <div class="icon">
                                        <i class="ri-map-pin-5-fill"></i>
                                    </div>
                                    <div class="select_country d-flex" style="position:relative;">
                                        <span class="select__flag" id="flag-display" style="cursor:pointer;"></span>
                                        <select id="country-select"
                                            class="select__input"
                                            name="country"
                                            style="opacity:0; position:absolute; top:0; left:0; width:100%; height:100%; cursor:pointer;">
                                            <option value="">Select Country</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="contact-item d-flex align-items-center">
                                    <div class="icon">
                                        <i class="ri-phone-fill"></i>
                                    </div>
                                    <div class="content">
                                        <a href="tel:+{{ $generalSetting->mobile }}">{{ $generalSetting->mobile }}</a>
                                    </div>
                                </div>
                                <div class="contact-item d-flex align-items-center">
                                    <div class="icon">
                                        <i class="ri-mail-unread-fill"></i>
                                    </div>
                                    <div class="content">
                                        <a href="mailto:{{ $generalSetting->email }}">{{ $generalSetting->email }}</a>
                                    </div>
                                </div>
                                <div class="contact-item payment-section">
                                    <div class="payment-info">
                                        <h6>We Accept</h6>
                                    </div>
                                    <div class="payment-logo">
                                        <img src="{{ asset('frontend-assets/img/all-img/paypal3.png')}}" alt="paypal">
                                        <img src="{{ asset('frontend-assets/img/all-img/american-express.png')}}" alt="american-express">
                                        <img src="{{ asset('frontend-assets/img/all-img/mastercard.png')}}" alt="mastercard">
                                        <img src="{{ asset('frontend-assets/img/all-img/visa.png')}}" alt="visa">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right-area">
            <div class="container">
                <div class="main-max-width">
                    <div class="row mb-3">
                        <div class="col-lg-6 col-xm-6 col-md-6">
                            <div class="cpr-left">
                                <p class="mb-0">Copyright @ 2014-2025 Centura America's Inc All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xm-6 col-md-6">
                            <div class="cpr-right">
                                <ul>
                                    <li><span>Follow Us:</span></li>
                                    <li><a href="https://www.facebook.com/" target="_blank"><i
                                                class="ri-facebook-fill"></i></a></li>
                                    <li><a href="https://www.instagram.com/" target="_blank"><i
                                                class="ri-instagram-line"></i></a></li>
                                    <li><a href="https://twitter.com/" target="_blank"><i
                                                class="ri-twitter-fill"></i></a></li>
                                    <li><a href="https://linkedin.com/" target="_blank"><i
                                                class="ri-linkedin-fill"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
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
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <div class="modal-body">
                <!-- Left: Image -->
                <div class="modal-image">
                    <img src="{{ asset('frontend-assets/img/callback-popup.jpg') }}" alt="Request Callback">
                </div>
                <!-- Right: Form -->
                <div class="modal-form">
                    <h4>Request a Callback</h4>
                    <hr>
                    <p>Leave your details and Our training consultant will get back to you</p>
                    <form action="{{route('request.callback')}}" method="POST">
                        @csrf
                        <div class="mb-1">
                            <input type="text" name="name" class="form-control" placeholder="Name *" required>
                        </div>
                        <div class="mb-1">
                            <div class="input-group">
                                <select name="country_code" id="phone-flag" class="form-select rounded-start-3 me-0 select2" required>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->phonecode }}" data-flag='{!! $country->flag !!}' data-id="{{ $country->id }}">
                                            +{{ $country->phonecode }} {!! $country->flag !!}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="text" 
                                    id="phone" 
                                    name="phone" 
                                    class="form-control rounded-end-3 border p-2" 
                                    placeholder="9090909090" 
                                    required 
                                    autocomplete="tel">
                            </div>
                        </div>

                        <div class="mb-1">
                            <input type="email" name="email" class="form-control" placeholder="Email *">
                        </div>

                        <div class="mb-1">
                            <select name="course_id" id="course_id" class="form-control ctrm_select" required>
                                <option value="">Select Program</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="mb-2 form-check">
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
        /* Professional form styling for callback modal */
        /* .modal-form form {
            background: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
            padding: 24px;
        }
        .modal-form h4 {
            font-weight: 700;
            color: #2a4d8f;
            margin-bottom: 12px;
        }
        .modal-form p {
            color: #6c757d;
            margin-bottom: 18px;
        }
        .modal-form .form-label {
            font-weight: 600;
            color: #2a4d8f;
        }
        .modal-form .form-control, .modal-form .form-select {
            border-radius: 6px;
            border: 1px solid #d1d5db;
            font-size: 1rem;
            padding: 10px 12px;
            margin-bottom: 10px;
            transition: border-color 0.2s;
        }
        .select2-container .select2-selection--single {
            height: 31px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 32px !important;
        }
        .modal-form .form-control:focus, .modal-form .form-select:focus {
            border-color: #2a4d8f;
            box-shadow: 0 0 0 2px rgba(42,77,143,0.15);
        }
        .modal-form .input-group {
            gap: 8px;
        }
        .modal-form .btn-primary {
            background: linear-gradient(90deg, #2a4d8f 0%, #3b82f6 100%);
            border: none;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 12px 0;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(42,77,143,0.08);
        }
        .modal-form .btn-primary:hover {
            background: linear-gradient(90deg, #3b82f6 0%, #2a4d8f 100%);
        }
        .modal-form .form-check-label {
            font-size: 0.97rem;
            color: #444;
        }
        .modal-form .form-check-input {
            accent-color: #2a4d8f;
        } */
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
            width: 100%;
            max-width: 750px; 
            background: #fff;
            padding: 25px 20px;
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
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .callbackmodal .modal-image img {
            border-radius: 8px;
            max-width: 100%;
            max-height: 320px;
            object-fit: cover;
        }

        .callbackmodal .modal-form {
            flex: 1;
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
        $(document).ready(function() {
            let storedCountryId = localStorage.getItem('selected_country_id');
            let countriesData = [];
            // Hide select initially
            $('#country-select').hide();
            // Load countries via AJAX
            $.ajax({
                url: '{{ route("get.countries") }}',
                type: 'GET',
                success: function(countries) {
                    countriesData = countries;
                    $('#country-select').append(
                        countries.map(function(country) {
                            let flagClass = `fi fi-${country.iso2.toLowerCase()} font-large-1`;
                            return `<option value="${country.id}" data-flag-class="${flagClass}" data-name="${country.name}">${country.name}</option>`;
                        })
                    );

                    if (storedCountryId) {
                        $('#country-select').val(storedCountryId);
                        updateFlag();
                    } else {
                        detectCountryByIP(countries);
                    }
                },
                error: function() {
                    alert('Failed to load countries.');
                }
            });

            function updateFlag() {
                const selected = $('#country-select option:selected');
                const flagClass = selected.data('flag-class');
                $('#flag-display').attr('class', 'select__flag ' + flagClass);
            }

            $('#country-select').on('change', function() {
                updateFlag();
                localStorage.setItem('selected_country_id', $(this).val());
                localStorage.setItem('scrollToTop', 'true');
                window.location.reload();
            });

            function detectCountryByIP(countries) {
                $.get('https://ipapi.co/json/', function(data) {
                    const matched = countries.find(c => c.name.toLowerCase() === data.country_name.toLowerCase());
                    if (matched) {
                        $('#country-select').val(matched.id);
                        updateFlag();
                        localStorage.setItem('selected_country_id', matched.id);
                    }
                });
            }

            // Click on flag → Toggle Select2 open/close
            $('#flag-display').on('click', function() {
                if (!$('#country-select').hasClass('select2-hidden-accessible')) {
                    $('#country-select').select2({
                        dropdownParent: $('.select_country'),
                        minimumInputLength: 2,
                        width: '100%',
                        placeholder: 'Select Country',
                        allowClear: false
                    });
                }

                // Toggle logic
                if ($('.select2-container--open').length > 0) {
                    $('#country-select').select2('close');
                } else {
                    $('#country-select').select2('open');
                }
                
                $('#flag-display').on('click', function() {
                    if (countriesData.length > 0) {
                        initSelect2();
                        
                        // Toggle the Select2 dropdown visibility
                        if ($('#country-select').next('.select2-container').is(':visible')) {
                            $('#country-select').select2('close');
                            $('#country-select').next('.select2-container').hide();
                        } else {
                            $('#country-select').next('.select2-container').show();
                            $('#country-select').select2('open');
                        }
                    }
                });
            });
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
            var countryId = localStorage.getItem('selected_country_id') || 0;

            $.ajax({
                url: '{{ route("user.set.country") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    country_id: countryId
                },
                success: function(response) {
                    // console.log("Country stored in session:", response);
                }
            });
        
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
    <script src='https://img1.wsimg.com/signals/js/clients/scc-c2/scc-c2.min.js'></script>
    <!-- Mirrored from centuera.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Jul 2025 10:40:45 GMT -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</html>