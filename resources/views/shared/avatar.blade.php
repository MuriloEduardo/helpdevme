@if (isset($user->avatar_url))
<img class="img-fluid avatar" src="{{ $user->avatar_url }}" alt="{{ $user->name }}">
@else
<i class="fas fa-user-circle {{ $icon_class }}"></i>
@endif
