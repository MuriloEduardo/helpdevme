@if (isset($user->avatar))
<img class="img-fluid avatar" src="{{ secure_asset('storage/img/avatars/' . $user->avatar) }}" alt="{{ $user->name }}">
@else
<i class=" fas fa-user-circle fa-2x"></i>
@endif
