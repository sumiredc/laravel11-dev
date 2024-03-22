@extends('layouts.auth')

@section('title', collect([__('Show'), $user->name])->join('-'))

@section('breadcrumb')
    <x-molecule.breadcrumb :items="[['label' => __('List'), 'href' => route('user.index')], ['label' => $user->name]]" />
@endsection

@section('content')
    <h1 class="my-3">{{ $user->name }}</h1>
    <div class="mb-3 d-flex gap-3">
        <x-atom.button class="btn-primary" :href="route('user.edit', $user)" icon="pen">{{ __('Edit') }}</x-atom.button>
        <x-atom.button class="btn-danger" data-bs-toggle="modal" data-bs-target="#userDeleteModdal" :disabled="Gate::denies('delete', $user)"
            icon="trash">{{ __('Delete') }}</x-atom.button>
        @can('delete', $user)
            <x-organism.user.delete-modal id="userDeleteModdal" :$user />
        @endcan
    </div>
    <section class="card">
        <div class="card-header">
            <span><strong>{{ __('ID') }}</strong>: {{ $user->id }}</span>
        </div>
        <div class="card-body d-flex gap-3">
            <div class="d-grid gap-3" style="flex-basis: 70%;">
                <x-atom.plain-text>
                    {{ $user->authority->name }}
                    @slot('label', __('Authority'))
                </x-atom.plain-text>
                <x-atom.plain-text>
                    {{ $user->name }}
                    @slot('label', __('Name'))
                </x-atom.plain-text>
                <x-atom.plain-text>
                    {{ $user->email }}
                    @slot('label', __('Email'))
                </x-atom.plain-text>
                <x-atom.plain-text>
                    {{ $user->email_verified_at?->format('Y-m-d H:i:s') }}
                    @slot('label', __('Email Verified'))
                </x-atom.plain-text>
            </div>
            <div class="d-flex justify-content-center align-items-center" style="flex-basis: 30%;">
                <div data-bs-target="#profileUploadModal" data-bs-toggle="modal" style="cursor: pointer;"
                    id="profileImageContainer">
                    <x-molecule.profile.image :profile="$user->profile" />
                </div>
                <x-organism.profile.upload-modal :$user id="profileUploadModal" />
            </div>
        </div>
        <div class="card-footer d-flex gap-3">
            <small><strong>{{ __('Created At') }}</strong>: {{ $user->created_at->format('Y-m-d H:i:s') }}</small>
            <small><strong>{{ __('Updated At') }}</strong>: {{ $user->updated_at->format('Y-m-d H:i:s') }}</small>
        </div>
    </section>
    <div class="d-flex justify-content-center my-5">
        <x-atom.button :href="route('user.index')" class="btn-link icon-link"
            icon="list">{{ __('Return to List') }}</x-atom.button>
    </div>
@endsection
