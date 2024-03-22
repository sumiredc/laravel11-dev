@empty($profile?->id)
    <x-atom.icon type="person-circle" style="font-size:10rem;" />
@else
    <img src="{{ route('profile.show', $profile) }}" alt="{{ __('Profile') }}" class="img-thumbnail" width="300"
        height="300" />
@endempty
