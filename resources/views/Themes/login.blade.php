@extends('Themes.master')
@section('title', 'Register')
@section('content')
    @include('Themes.partials.hero', ['title' => 'Rigister'])
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-6 mx-auto">
                    <form action="{{ route('login') }}" class="form-contact contact_form" method="post"
                        novalidate="novalidate">
                        @csrf
                        <div class="form-group">
                            <input class="form-control border" name="email" id="email" value="{{ old('email') }}"
                                type="email" placeholder="Enter email address">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                        </div>
                        <div class="form-group">
                            <input class="form-control border" name="password" id="name" type="password"
                                placeholder="Enter your password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                        </div>
                        <div class="form-group text-center text-md-right mt-3">
                            <button type="submit" class="button button--active button-contactForm">Login</button>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('register') }}">Don't have an account? Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
