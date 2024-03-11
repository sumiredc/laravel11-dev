@extends('layouts.auth')

@section('title', __('User Create'))

@section('content')

    <h1 class="my-3">{{ __('User Create') }}</h1>
    <x-atom.form method="POST" :action="route('user.store')">
        <section class="card">
            <div class="card-body d-grid gap-3">
                <x-atom.select :items="$authorities" name="authority" :value="old('authority')" unselected>
                    @slot('label', __('Authority'))
                </x-atom.select>
                <x-atom.input name="name" :value="old('name')">
                    @slot('label', __('Name'))
                </x-atom.input>
                <x-atom.input name="email" :value="old('email')">
                    @slot('label', __('Email'))
                </x-atom.input>
                <x-atom.button type="submit" class="btn-primary btn-lg">{{ __('Create') }}</x-atom.button>
            </div>
        </section>
    </x-atom.form>

@endsection
