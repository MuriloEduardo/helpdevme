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
</ul>
