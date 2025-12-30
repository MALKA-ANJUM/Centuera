@extends('user.layouts.layout')
@section('title', 'Dashboard | Centuera')
@section('content')
@php
$activeTab = request('tab', session('form', 'profile'));
@endphp
<div class="container py-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-3 mb-4">
            <div class="card border-0 rounded-4">
                <div class="card-body text-center">
                    <div class="mb-3">
                        @if(auth()->user()->image != null)
                        <img src="{{ asset('user/profile/'. auth()->user()->image) }}" alt="Profile Picture" class="rounded-circle" width="70" height="70">
                        @else
                        <img src="https://cfaccounts.simplilearn.com/profile.png" alt="Profile Picture" class="rounded-circle" width="70" height="70">
                        @endif
                    </div>
                    <h5 class="mb-4">Malka Anjum</h5>
                    <!-- <p class="text-muted small mb-2">Profile completed 52%</p>
                    <div class="progress mb-5" style="height: 6px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 52%"></div>
                    </div> -->

                    <!-- Sidebar Tabs -->
                    <div class="nav flex-column nav-pills" id="profileTabs" role="tablist" aria-orientation="vertical">
                        <button class="nav-link pill {{ $activeTab === 'profile' ? 'active' : '' }} text-start" id="basic-tab" data-bs-toggle="pill" data-bs-target="#basic" type="button" role="tab">Basic details</button>
                        <button class="nav-link text-start {{ $activeTab === 'contact' ? 'active' : '' }}" id="contact-tab" data-bs-toggle="pill" data-bs-target="#contact" type="button" role="tab">Contact details</button>
                        <button class="nav-link text-start {{ $activeTab === 'password' ? 'active' : '' }}" id="password-tab" data-bs-toggle="pill" data-bs-target="#password" type="button" role="tab">Update Password</button>
                        <button class="nav-link text-start {{ $activeTab === 'orders' ? 'active' : '' }}" id="password-tab" data-bs-toggle="pill" data-bs-target="#orders" type="button" role="tab">Orders</button>

                        <a href="{{ route('user.logout') }}" class="nav-link text-start">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-9">
            <div class="tab-content" id="profileTabsContent">
                <!-- Basic Details -->
                <div class="tab-pane fade show {{ $activeTab === 'profile' ? 'show active' : '' }}" id="basic" role="tabpanel" id="profile">
                    <div class="p-2">
                        <div class="form_info">
                            <h3>Basic details</h3>
                        </div>
                        <form method="post" action="{{ route('user.update.basic') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <!-- Title -->
                                <div class="col-md-6">
                                    <label class="form-label mb-0">Title <span class="text-danger">*</span></label>
                                    <select class="form-select pt-0 form-control" name="title" required>
                                        <option value="">--Select--</option>
                                        <option value="mr" {{ old('title', auth()->user()->title) == 'mr' ? 'selected' : '' }}>Mr.</option>
                                        <option value="mrs" {{ old('title', auth()->user()->title) == 'mrs' ? 'selected' : '' }}>Mrs.</option>
                                        <option value="ms" {{ old('title', auth()->user()->title) == 'ms' ? 'selected' : '' }}>Ms.</option>
                                        <option value="dr" {{ old('title', auth()->user()->title) == 'dr' ? 'selected' : '' }}>Dr.</option>
                                        <option value="prof" {{ old('title', auth()->user()->title) == 'prof' ? 'selected' : '' }}>Prof.</option>
                                        <option value="oth" {{ old('title', auth()->user()->title) == 'oth' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>


                                <!-- First name -->
                                <div class="col-md-6">
                                    <label class="form-label mb-0">First name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="first_name" value="{{ auth()->user()->first_name }}" required>
                                </div>

                                <!-- Middle name -->
                                <div class="col-md-6">
                                    <label class="form-label mb-0">Middle name</label>
                                    <input type="text" class="form-control" name="middle_name" value="{{ auth()->user()->middle_name }}">
                                </div>

                                <!-- Last name -->
                                <div class="col-md-6">
                                    <label class="form-label mb-0">Last name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="last_name" value="{{ auth()->user()->last_name }}" required>
                                </div>

                                <!-- Gender -->
                                <div class="col-md-6">
                                    <label class="form-label mb-0">Gender <span class="text-danger">*</span></label>
                                    <select class="form-select pt-0 form-control" name="gender" required>
                                        <option value="F" {{ old('gender', auth()->user()->gender) == 'F' ? 'selected' : '' }}>Female</option>
                                        <option value="M" {{ old('gender', auth()->user()->gender) == 'M' ? 'selected' : '' }}>Male</option>
                                        <option value="OTH" {{ old('gender', auth()->user()->gender) == 'OTH' ? 'selected' : '' }}>Other</option>
                                        <option value="NO" {{ old('gender', auth()->user()->gender) == 'NO' ? 'selected' : '' }}>Prefer not to say</option>
                                    </select>
                                </div>

                                <!-- DOB -->
                                <div class="col-md-6">
                                    <label class="form-label mb-0">Date of birth <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="dob" value="{{ auth()->user()->dob }}" required>
                                    <small class="text-muted">Safely used to understand your learning profile. We respect your privacy.</small>
                                </div>

                                <!-- Training funded -->
                                <div class="col-md-6">
                                    <label class="form-label mb-0">How is your training funded? <span class="text-danger">*</span></label>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="training_funded_by" id="self" value="self" {{ old('training_funded_by', auth()->user()->training_funded_by) == 'self' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="self">Self</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="training_funded_by" id="organisation" value="organisation" {{ old('training_funded_by', auth()->user()->training_funded_by) == 'organisation' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="organisation">Organisation</label>
                                    </div>
                                </div>


                                <!-- Profile Picture -->
                                <div class="col-md-6">
                                    <label class="form-label mb-0">Upload your picture</label>
                                    <div class="d-flex align-items-center gap-3">
                                        @if(auth()->user()->image != null)
                                        <img src="{{ asset('user/profile/'. auth()->user()->image) }}" alt="Profile Picture" class="rounded-circle" width="70" height="70">
                                        @else
                                        <img src="https://cfaccounts.simplilearn.com/profile.png" alt="Profile Picture" class="rounded-circle" width="70" height="70">
                                        @endif
                                        <input type="file" class="form-control" name="image" accept=".png, .jpg, .jpeg, .gif">
                                    </div>
                                </div>

                                <!-- LinkedIn -->
                                <div class="col-md-6">
                                    <label class="form-label mb-0">LinkedIn profile link</label>
                                    <input type="url" class="form-control" name="linkedin" value="{{ auth()->user()->linkedin }}" placeholder="Your LinkedIn Profile URL">
                                    <small class="text-muted">We recommend creating a LinkedIn account if you don’t have one yet.</small>
                                </div>

                                <!-- Buttons -->
                                <div class="col-12 text-end">
                                    <button type="reset" class="btn btn-outline-secondary me-2">Discard</button>
                                    <button type="submit" class="btn btn-outline-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Details -->
                <div class="tab-pane fade {{ $activeTab === 'contact' ? 'show active' : '' }}" id="contact" role="tabpanel">
                    <div class="p-2">
                        <div class="form_info">
                            <h3>Contact details</h3>
                        </div>
                        <form id="" action="{{ route('user.update.contact') }}" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label mb-0">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="mobile" class="form-label mb-0">
                                            Mobile No. <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <select name="country_code" id="phone-flag" class="form-select rounded-start-3 me-0 select2" required>
                                                @foreach($countries as $country)
                                                <option
                                                    value="{{ $country->phonecode }}"
                                                    data-flag='{!! $country->flag !!}'
                                                    data-id="{{ $country->id }}"
                                                    {{ old('country_code', auth()->user()->country_code) == $country->phonecode ? 'selected' : '' }}>
                                                    +{{ $country->phonecode }} {!! $country->flag !!}
                                                </option>
                                                @endforeach
                                            </select>

                                            <input
                                                type="text"
                                                class="form-control p-2"
                                                id="mobile"
                                                name="mobile"
                                                placeholder="9090909090"
                                                value="{{ old('mobile', auth()->user()->mobile) }}"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="country" class="form-label mb-0">Country of Residence <span class="text-danger">*</span></label>
                                        <select id="country" name="country" class="form-select pt-0 form-control select2" required>
                                            <option value="">-- Select Country --</option>
                                            @foreach($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ old('country', auth()->user()->country) == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="state" class="form-label mb-0">State <span class="text-danger">*</span></label>
                                        <select id="state" name="state" class="form-select pt-0 form-control select2" required>
                                            <option value="">-- Select State --</option>
                                            @if(!empty($states))
                                            @foreach($states as $state)
                                            <option value="{{ $state->id }}"
                                                {{ old('state', auth()->user()->state) == $state->id ? 'selected' : '' }}>
                                                {{ $state->name }}
                                            </option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="city" class="form-label mb-0">City <span class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control"
                                            id="city"
                                            name="city"
                                            value="{{ old('city', auth()->user()->city) }}"
                                            placeholder="Enter city"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="timezone" class="form-label mb-0">Timezone <span class="text-danger">*</span></label>
                                        <select id="timezone_id" name="timezone_id" class="form-select pt-0 form-control select2" required>
                                            <option value="">-- Select Timezone --</option>
                                            @foreach($countries as $country)
                                            <option value="{{ $country->getTimeZone->country_code ?? '' }}"
                                                {{ old('timezone_id', auth()->user()->timezone_id) == ($country->getTimeZone->country_code ?? '') ? 'selected' : '' }}>
                                                {{ $country->name }}: {{ $country->getTimeZone->timezone ?? '' }} {{ $country->getTimeZone->gmt_offset ?? '' }}.00
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="address" class="form-label mb-0">Correspondence Address</label>
                                        <textarea id="address"
                                            name="address"
                                            class="form-control"
                                            rows="3"
                                            placeholder="Enter your correspondence address">{{ old('address', auth()->user()->address) }}</textarea>
                                        <div class="form-text">If a physical certificate is applicable, it will be sent to this address.</div>
                                    </div>
                                </div>

                            </div>
                            <!-- Buttons -->
                            <div class="d-flex justify-content-end gap-2">
                                <button type="reset" class="btn btn-outline-secondary">Discard</button>
                                <button type="submit" class="btn btn-outline-primary">Save Changes</button>
                            </div>

                        </form>

                    </div>
                </div>

                <!-- Update Password -->
                <div class="tab-pane fade show  {{ $activeTab === 'password' ? 'show active' : '' }}" id="password" role="tabpanel">
                    <div class="p-2">
                        <div class="form_info">
                            <h3>Update Password</h3>
                        </div>
                        <form method="post" action="{{ route('user.update.password') }}">
                            @csrf
                            <div class="row g-3">
                                <!-- Password -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label mb-0">Password <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control rounded-start-3 border p-2" id="password" name="password" placeholder="••••••••" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="c_password" class="form-label mb-0">Confirm Password <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control rounded-start-3 border p-2" id="c_password" name="c_password" placeholder="••••••••" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="col-12 text-end">
                                    <button type="reset" class="btn btn-outline-secondary me-2">Discard</button>
                                    <button type="submit" class="btn btn-outline-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="tab-pane fade show  {{ $activeTab === 'orders' ? 'show active' : '' }}" id="orders" role="tabpanel">
                   @include('user.order')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>
    span.select2-selection.select2-selection--single {
        background-color: #fff;
        border: 0 !important;
        border-bottom: 1px solid #ccc !important;
        border-radius: 0 !important;
    }

    .select2-container .select2-selection--single {
        height: 32px !important;
    }
</style>
@endpush


@push('script')
<script>
    $(document).ready(function() {
        $('#country').on('change', function() {
            var countryId = $(this).val();

            // Clear existing states
            $('#state').empty().append('<option value="">-- Select State --</option>').trigger('change');

            if (countryId) {
                $.ajax({
                    url: "{{ route('get.states') }}",
                    type: "GET",
                    data: {
                        country_id: countryId
                    },
                    success: function(data) {
                        $.each(data, function(key, state) {
                            $('#state').append('<option value="' + state.id + '">' + state.name + '</option>');
                        });
                        $('#state').trigger('change'); // Refresh Select2
                    }
                });
            }
        });
    });
    $(document).ready(function() {
        let storedCountryId = localStorage.getItem('selected_country_id');

        if (storedCountryId) {
            $("#phone-flag option").each(function() {
                if ($(this).data("id") == storedCountryId) {
                    $(this).prop("selected", true);
                }
            });
        }

        $('#phone-flag').select2();
    });
</script>
@endpush