<div {{ $attributes->class('modal fade')->merge(['tabindex' => '-1', 'aria-hidden' => 'true']) }}>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Profile Upload') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <input class="form-control" type="file" id="profileUploadInput" data-user-id="{{ $user->id }}">
            </div>
        </div>
    </div>
</div>
