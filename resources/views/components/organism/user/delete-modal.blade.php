<div {{ $attributes->class('modal fade')->merge(['tabindex' => '-1', 'aria-hidden' => 'true']) }}>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('User Delete') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="fw-bold">{{ __('ID') }}:{{ $user->id }} - {{ $user->name }}</h5>
                <p>{{ __('Are you sure you want to delete this user information?') }}</p>
                <div class="alert alert-warning small m-0">{{ __('This action cannot be undone.') }}</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <x-atom.form method="DELETE" :action="route('user.destroy', $user)">
                    <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                </x-atom.form>
            </div>
        </div>
    </div>
</div>
