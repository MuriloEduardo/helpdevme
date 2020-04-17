@if (isset($user->avatar))
<img class="img-fluid avatar" src="{{ $user->avatar }}" alt="{{ $user->name }}">
@else
<i class="fas fa-user-circle {{ $icon_class }}"></i>
@endif
