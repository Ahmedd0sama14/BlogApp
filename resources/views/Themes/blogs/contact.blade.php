@extends('Themes.master')
@section('title', 'Contact')
@section('content')

@include('Themes.partials.hero', ['title' => 'Contact'])
<x-alert type="success" />
<section class="section-margin--small section-margin">
    <div class="container">
        <div class="row">
            <!-- معلومات -->
            <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Cairo - Egypt</h3>
                        <p>Mansoura</p>
                    </div>
                </div>

                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-headphone"></i></span>
                    <div class="media-body">
                        <h3><a href="tel:454545654">+201003260157</a></h3>
                        <p>Available 24/7</p>
                    </div>
                </div>

                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3><a href="mailto:support@yourdomain.com">support@yourdomain.com</a></h3>
                        <p>Send us your question anytime!</p>
                    </div>
                </div>
            </div>

            <!-- الفورم -->
            <div class="col-md-8 col-lg-9">


                <form action="{{ route('contacts') }}" method="POST" class="contact_form">
                    @csrf

                    <div class="row">
                        <div class="col-lg-5">

                            <div class="form-group mb-3">
                               <x-form.input name="name" placeholder="Enter your name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-1" />
                            </div>

                            <div class="form-group mb-3">
                                <x-form.input name="email" type="email" placeholder="Enter your email" />
                                <x-input-error :messages="$errors->get('email')" class="mt-1" />
                            </div>

                            <div class="form-group mb-3">
                                <x-form.input name="subject" placeholder="Enter Subject" />
                                <x-input-error :messages="$errors->get('subject')" class="mt-1" />
                            </div>

                        </div>

                        <div class="col-lg-7">
                            <div class="form-group mb-3">
                                <x-form.textarea name="message"  rows="7" />
                                <x-input-error :messages="$errors->get('message')" class="mt-1" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-end mt-3">
                        <button type="submit" class="btn btn-primary px-4">
                            Send Message
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

@endsection
