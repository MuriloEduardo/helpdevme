@if (isset($user->avatar))
<img class="img-fluid avatar {{ $icon_class }}" src="{{ $user->avatar }}" alt="{{ $user->name }}">
@else
<i class="fas fa-user-circle {{ $icon_class ? $icon_class : 'fa-2x' }}"></i>
@endif
