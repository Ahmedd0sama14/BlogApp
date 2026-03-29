@extends('Themes.master')
@section('title', 'Register')
@section('content')
    @include('Themes.partials.hero', ['title' => 'Rigister'])

    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <form action="{{ route('register') }}" class="form-contact contact_form" method="post" id="contactForm"
                        novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control border" name="name" value="{{ old('name') }}"
                                        id="name" type="text" placeholder="Enter your name">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                </div>
                                <div class="form-group">
                                    <input class="form-control border" name="email" value="{{ old('email') }}"
                                        id="email" type="email" placeholder="Enter email address">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control border" name="password" id="name" type="password"
                                        placeholder="Enter your password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control border" name="password_confirmation" type="password"
                                        placeholder="Confirm your password">
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <div class="form-group text-center mt-4">
                                    <button type="submit" class="button button--active button-contactForm px-5">
                                        Create Account
                                    </button>
                                </div>

                                <div class="text-center mt-3">
                                    <p class="mb-0">
                                        Already have an account?
                                        <a href="{{ route('login') }}" class="text-primary font-weight-bold">
                                            Login here
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
