@extends('layouts.public') @php $title = 'Se você é programador esse conteúdo é
para você'; $description = 'Saca só, juntamos o útil ao agradável para acabar
com as dúvidas que nunca conseguimos achar solução prática e ficamos em sérios
apuros. Juntamos isso com uma recompensa por essas ajudas para os Dev\'s. Nada
absurdo, e você estará ajudando quem te ajuda...'; @endphp @section('title',
$title . ' - Help Dev') @section('description', $description)
@section('keywords', 'programadores, dev\'s, desenvolvedores, developers,
desenvolvimento, software, programador, ajuda, stackoverflow, solução de bugs,
bugs') @section('main')
<section class="header-site p-5 bg-success shadow-sm">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8 text-white">
				<h1 class="pb-3">{{ $title }}</h1>
				<p class="lead py3">{{ $description }}</p>
			</div>
			<div class="col">
				<div class="bg-white p-5 shadow">
					<h3 class="display-4 mb-5">
						Nos ajude a avaliar esse projeto?
					</h3>
					@include('auth.register-form')
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md bg-success-opacity p-5">
				<article>
					<h2 class="pb-4">Ajude e seja ajudado</h2>
					<p>
						Isso é mais que comercial, é social, é um vínculo para
						colegas de profissão(ou não) se ajudarem. Então para o
						Help Dev o novo App feito por desenvolvedores para
						desenvolvedores.
					</p>
				</article>
			</div>
			<div class="col-md p-5">
				<article>
					<h2 class="pb-4">Juntando o útil ao agradável</h2>
					<p>
						Você só vai precisar publicar sua pergunta com um valor
						mínimo de R$2,50, não da nem pra chorar o preço de tão
						barato(e se você quiser recompensar por mais se for uma
						dúvida muito complicada de se resolver também pode). E
						logo logo você receberá propostas de pessoas
						qualificadas para te ajudar e acabar com sua dúvida.
					</p>
				</article>
			</div>
		</div>
	</div>
</section>
<section class="bg-white">
	<div class="container-fluid p-5">
		<h2 class="pb-4 text-center">Como funciona?</h2>
		<div class="row">
			<div class="col-sm py-3">
				<span class="h2 mr-3 text-success">1</span>Você está a dias
				empacado num determinado trecho do seu código
			</div>
			<div class="col-sm py-3">
				<span class="h2 mr-3 text-success">2</span>Envia um pedido de
				ajuda a outros devs cadastrados na plataforma
			</div>
			<div class="col-sm py-3">
				<span class="h2 mr-3 text-success">3</span>Os que souberem se
				candidatam a resolver junto com você o seu problema(junto com
				uma recompensa, claro)
			</div>
			<div class="col-sm py-3">
				<span class="h2 mr-3 text-success">4</span>O valor da recompensa
				fica guardado, até que o problema seja resolvido ou estornado.
			</div>
			<div class="col-sm py-3">
				<span class="h2 mr-3 text-success">5</span>Vocês trabalham
				juntos, em um espaço com ferramentas úteis para trabalharem no
				problema(ChatCam, Git, Editor de Código...)
			</div>
			<div class="col-sm py-3">
				<span class="h2 mr-3 text-success">6</span>O dev profissional
				resolve seu problema e vocês dois concordam com isso
			</div>
			<div class="col-sm py-3">
				<span class="h2 mr-3 text-success">7</span>A recompensa vai para
				ele, e você continua codando aquele seu freela, uma poc(como
				essa...)
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container p-5">
		<h2 class="pb-4 text-center">Dúvidas</h2>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">
				<h3 class="font-weight-strong">
					E se o dev disser que não o ajudei para não liberar a
					recompensa?
				</h3>
				<p>
					A plataforma guarda a recompensa até que ambos entrem em
					acordo que ela foi solucionada pelo profissional, que em
					casos de sucesso é liberado para ele. Caso haja divergências
					ou dinheiro será devolvido ou poderá ser solicitado um
					processo de arbitragem(por ambos os lados).
				</p>
			</li>
			<li class="list-group-item">
				<h3 class="font-weight-strong">
					Vou poder sacar a grana em mãos?
				</h3>
				<p>
					Isto ainda é uma POC, portanto o dinheiro será no modo
					sandbox do PayPal.
				</p>
			</li>
			<li class="list-group-item">
				<h3 class="font-weight-strong">
					Até quanto daria pra ganhar por mês como dev profissional?
				</h3>
				<p>
					Se você responder 1 pergunta por dia - com recompensa mínima
					- poderá ganhar até R$77,50 por mês.
				</p>
			</li>
			<li class="list-group-item">
				<h3 class="font-weight-strong">
					E se o profissional não me ajudar de forma prática?
				</h3>
				<p>
					A plataforma poderá atuar com um processo humano de
					arbitragem, que pode ser solicitado por ambos os lados a
					qualquer momento.
				</p>
			</li>
			<li class="list-group-item">
				<h3 class="font-weight-strong">
					Como vou saber o fim daquela ajuda? E se a soluçao for
					muito maior que a esperada por ambos?
				</h3>
				<p>
					O valor pode ser reajustado ao longo da resolução do
					problema.
				</p>
			</li>
		</ul>
		<div class="text-center mt-5">
			<h3 class="font-weight-strong">Quais são as dúvidas de vocês?</h3>
			<a href="https://forms.gle/aEctUivZ2yBWr6EV8" target="_blank" class="btn btn-primary">Envie as suas</a>
		</div>
	</div>
</section>
@endsection
