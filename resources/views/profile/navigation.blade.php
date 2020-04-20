<ul class="nav flex-column">
	<li class="nav-item">
		<a class="nav-link {{ (request()->is('profile')) ? 'active' : '' }}" href="{{ route('profile.infos') }}">Informações Pessoais</a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{ (request()->is('profile/password')) ? 'active' : '' }}" href="{{ route('profile.password') }}">Senha</a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{ (request()->is('activities/client')) ? 'active' : '' }}" href="{{ route('activities.client') }}">Como Aprendiz</a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{ (request()->is('activities/freelancer')) ? 'active' : '' }}" href="{{ route('activities.freelancer') }}">Como Mentor</a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{ (request()->is('profile/notifications')) ? 'active' : '' }}" href="{{ route('profile.notifications') }}">Notificações</a>
	</li>
	<li class="nav-item">
		<a class="nav-link text-muted" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
			@lang('layouts.navbar.logout')
		</a>

		<form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
			@csrf
		</form>
	</li>
</ul>
