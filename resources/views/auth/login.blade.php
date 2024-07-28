@extends('layouts.header')
@section('title', 'Login page')

<div class="main-wrapper">
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center bg-gray-100 min-h-screen">

            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-8 col-xl-6 mx-auto">
                    <div class="card shadow-lg rounded-lg">
                        <div class="row g-0">
                            <div class="col-md-2"></div>
                            <div class="col-md-8 bg-white">
                                <div class="auth-form-wrapper px-4 py-5">
                                    <a href="#" class="noble-ui-logo logo-light d-block mb-2 text-center text-indigo-600 text-2xl font-bold">CANVAS<span>ICT</span></a>
                                    <h5 class="text-gray-600 fw-normal mb-4 text-center">Log in to your account.</h5>
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <form class="forms-sample" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="userEmail" id="email" name="email" :value="__('Email')" class="form-label text-gray-700">Email address</label>
                                            <input type="email" class="form-control bg-gray-100 border border-gray-300 text-gray-900" id="userEmail" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-700" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="userPassword" :value="__('Password')" class="form-label text-gray-700">Password</label>
                                            <input type="password" class="form-control bg-gray-100 border border-gray-300 text-gray-900" name="password" id="userPassword" required autocomplete="current-password" placeholder="Password">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-700" />
                                        </div>
                                        <div class="form-check mb-3">
                                            <input type="checkbox" class="form-check-input" id="authCheck">
                                            <label class="form-check-label text-gray-700" for="authCheck">
                                                {{ __('Remember me') }}
                                            </label>
                                        </div>
                                        <div>
                                            <x-primary-button class="btn btn-primary w-full py-2 text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                {{ __('Log in') }}
                                            </x-primary-button>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-indigo-600 hover:text-indigo-700 text-center d-block mt-1" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@include('layouts.footer')
