@extends('layouts.auth')

@section('title', collect([__('Edit'), $user->name])->join('-'))

@section('content')
    <h1 class="my-3">{{ __('User Edit') }}</h1>
    @if ($hasSuccessMessage())
        <div class="alert alert-success">
            {{ $successMessage() }}
        </div>
    @endif

    <x-atom.form method="PUT" :action="route('user.update', $user)">
        <section class="card">
            <div class="card-header">
                <span><strong>{{ __('ID') }}</strong>: {{ $user->id }}</span>
            </div>
            <div class="card-body d-grid gap-3">
                <x-atom.input name="name" :value="old('name', $user->name)">
                    @slot('label', __('Name'))
                </x-atom.input>
                <x-atom.input name="email" :value="old('email', $user->email)">
                    @slot('label', __('Email'))
                </x-atom.input>
                <x-atom.button type="submit" class="btn-primary btn-lg">{{ __('Update') }}</x-atom.button>
            </div>
            <div class="card-footer d-flex gap-3">
                <small><strong>{{ __('Created At') }}</strong>: {{ $user->created_at->format('Y-m-d H:i:s') }}</small>
                <small><strong>{{ __('Updated At') }}</strong>: {{ $user->updated_at->format('Y-m-d H:i:s') }}</small>
            </div>
        </section>
    </x-atom.form>

    <div class="d-flex justify-content-center my-5">
        <x-atom.button :href="route('user.show', $user)" class="btn-secondary">{{ __('Return to Details') }}</x-atom.button>
    </div>
@endsection
