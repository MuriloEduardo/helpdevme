@if (isset($user->avatar))
<img class="img-fluid avatar" src="{{ $user->avatar }}" alt="{{ $user->name }}" title="{{ $user->name }}">
@else
<i class="fas fa-user-circle fa-2x"></i>
@endif
