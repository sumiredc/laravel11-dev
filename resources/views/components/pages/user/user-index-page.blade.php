@php
    use App\Enums\User\UserEmailStatus;
@endphp

@extends('layouts.auth')

@section('title', __('User List'))

@section('content')
    <x-molecule.breadcrumb :items="[['label' => __('List')]]" />
    <h1 class="my-3">{{ __('User List') }}</h1>
    <div class="mb-3 d-flex gap-3">
        <x-atom.button class="btn-primary" :href="route('user.create')">{{ __('Create') }}</x-atom.button>
    </div>
    <div class="list-group">
        <div class="d-flex list-group-item list-group-item-dark fw-bold">
            <div style="flex-basis:30%">{{ __('Name') }}</div>
            <div style="flex-basis:40%">{{ __('Email') }}</div>
            <div style="flex-basis:30%">{{ __('Created At') }}</div>
        </div>
        @forelse ($users as $user)
            <a href="{{ route('user.show', $user) }}"
                class="list-group-item list-group-item-action d-flex align-items-center">
                <div style="flex-basis:30%">{{ $user->name }}</div>
                <div style="flex-basis:40%">
                    <div>
                        <span @class([
                            'badge',
                            'bg-primary' => $user->email_status === UserEmailStatus::Authenticated,
                            'bg-secondary' => $user->email_status === UserEmailStatus::Unauthenticated,
                        ])>{{ $user->email_status->value }}</span>
                    </div>
                    <div>{{ $user->email }}</div>
                </div>
                <div style="flex-basis:30%">{{ $user->created_at->format('Y-m-d H:i:s') }}</div>
            </a>
        @empty
            <div class="alert alert-info">
                {{ __('User is not registered.') }}
            </div>
        @endforelse
        {{ $users->links() }}
    </div>
@endsection
