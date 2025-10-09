@extends('user.layouts.layout')
@section('title', 'Dashboard')
@section('content')
<!-- BEGIN: Content-->

<!--  Page Title Area Start-->
    <section class="page-title-area position-relative">
        <div class="container">
            <div class="main-max-width">
                <div class="page-title-content">
                    <h2>Contact</h2>
                    <ul class="page-breadcrumb align-items-center list-unstyle">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"></li>
                        <li class="primery-link">Contact</li>
                    </ul>

                </div>
            </div>
        </div>
    </section>
    <!--  Page Title Area End-->

    <!-- Contact Area Start -->
    <div class="contact-section">
        <div class="container">
            <div class="main-max-width">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="content">
                            <h2 class="fs-35 mb-30 gradient-style">Get In Touch</h2>
                            <p>Whether you have questions about our services, want to explore potential collaboration
                                opportunities,</p>
                                @if(session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif

                            <div class="contact-form">
                                <form id="submitForm" method="post" action="{{route('store.contact')}}">  
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group mb-15">
                                                <input type="text" name="name" placeholder="Name"
                                                    class="bg-white input-style border-style w-100 h-60" required>
                                            </div>
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group mb-15">
                                                <input type="text" name="mobile" placeholder="mobile" maxlength="10"
                                                    class="bg-white input-style border-style w-100 h-60" required>
                                            </div>
                                            @error('mobile')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group mb-15">
                                        <input type="email" name="email" placeholder="Your email"
                                            class="bg-white input-style border-style w-100 h-60" required>
                                    </div>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                    <div class="form-group mb-15">
                                        <label class="label-style">Message</label>
                                        <textarea name="message" id="message"  cols="30" rows="5"
                                            class="bg-white input-style border-style w-100"
                                            placeholder="Your comments here"></textarea>
                                    </div>
                                    <button class="btn style-one box-shadow-1" data-animation="fadeInRight" data-delay=".8s" type="submit"><span>Send Message</button>    
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-info">
                            <h4 class="fs-20 text-title">Contact Us</h4>

                            <div class="content mb-40">
                                <div class="info-item d-flex align-items-center">
                                    <div class="icon">
                                        <img src="{{ asset('admin/contact/location-icon.svg') }}" alt="icon">
                                    </div>
                                    <div class="text">
                                        <h5 class="fs-16">Address</h5>
                                        <p class="mb-0">{{$contactpage->address}}</p>
                                    </div>
                                </div>
                                <div class="info-item d-flex align-items-center">
                                    <div class="icon">
                                        <img src="{{ asset('admin/contact/mail-icon.svg') }}" alt="icon">
                                    </div>
                                    <div class="text">
                                        <h5 class="fs-16">Email</h5>
                                        <a href="mailto:{{$contactpage->email}}">{{$contactpage->email}}</a>
                                    </div>
                                </div>
                                <div class="info-item d-flex align-items-center">
                                    <div class="icon">
                                        <img src="{{ asset('admin/contact/phone-icon.svg') }}" alt="icon">
                                    </div>
                                    <div class="text">
                                        <h5 class="fs-16">Phone</h5>
                                        <a href="tel:{{$contactpage->mobile}}">{{$contactpage->mobile}}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="social-profile d-flex align-items-center">
                                <span class="fs-16">Follow Us:</span>
                                <ul class="list-unstyle d-flex">
                                    <li>
                                        <a href="{{ $contactpage->facebook }}" target="_blank">
                                            <i class="ri-facebook-fill"></i>
                                        </a>
                                    </li>

                                    <li><a href="{{ $contactpage->twitter }}" target="_blank"><i
                                                class="ri-twitter-x-fill"></i></a></li>
                                    <li><a href="{{ $contactpage->instagram }}" target="_blank"><i
                                                class="ri-instagram-line"></i></a></li>
                                    <li><a href="{{ $contactpage->linkedin }}" target="_blank"><i
                                                class="ri-linkedin-fill"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map-loc pb-100">
        <div class="container-fluid g-0">
            <div class="office-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8385385572983!2d144.95358331584498!3d-37.81725074201705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4dd5a05d97%3A0x3e64f855a564844d!2s121%20King%20St%2C%20Melbourne%20VIC%203000%2C%20Australia!5e0!3m2!1sen!2sbd!4v1612419490850!5m2!1sen!2sbd">
                </iframe>
            </div>
        </div>
    </div>
    <!-- Contact Area End -->
   
<!-- END: Content-->
@endsection