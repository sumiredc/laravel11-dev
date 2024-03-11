@extends('layouts.guest')

@section('title', __('Top Page'))

@section('content')
    <h1 class="text-center my-5 fw-bold">{{ __('Laravel 11') }}</h1>
    <section class="py-5 d-flex justify-content-center">
        <div class="w-100" style="max-width:500px;">
            <h2 class="mb-3"><span class="me-2 text-brand">#</span>{{ __('Login') }}</h2>
            <div class="card card-body bg-secondary gap-3">
                <x-atom.form method="POST" :action="route('sign-in.store')">
                    <div class="d-grid gap-3">
                        <div class="form-floating">
                            <input type="email" class="form-control" placeholder="name@example.com" name="email"
                                value="test@sumire-sakamoto.co.jp">
                            <label>{{ __('Email address') }}</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" placeholder="Password" name="password"
                                value="Muhoho123456-">
                            <label>{{ __('Password') }}</label>
                        </div>
                        <x-atom.button type="submit" class="btn-primary btn-lg">{{ __('Sign-In') }}</x-atom.button>
                    </div>
                </x-atom.form>
                @if ($errors->isNotEmpty())
                    <div class="alert alert-danger m-0">{{ __('Login attempt unsuccessful.') }}</div>
                @endif
            </div>
        </div>
    </section>
@endsection
