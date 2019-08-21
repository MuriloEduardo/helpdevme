@extends('layouts.app')

@section('title', 'Compartilhando Conhecimento - ')

@section('content')
<header class="header-site mb-5 p-5 bg-white shadow-sm">
	<div class="row">
		<div class="col-lg-8">
			<h1 class="display-4">Help Dev - Compartilhando Conhecimento</h1>
			<p class="lead py-4">Quantas vezes n&oacute;s Dev's ficamos desesperados atr&aacute;s de uma
				solu&ccedil;&atilde;o para uma d&uacute;vida?</p>
			<div>
				<b-button @click="$bvModal.show('modal-create-question')" variant="link"
						class="btn text-white btn-success px-5">Pedir Ajuda</b-button>
				<a class="btn btn-outline-primary" href="{{ route('questions.index') }}">Ajude seus colegas de profissão!</a>
			</div>
		</div>
	</div>
</header>
<div class="row">
	<div class="col-lg-10 offset-1">
		<article>
			<div class="row">
				<div class="col-lg-6 py-4">No stackoverflow n&atilde;o encontramos algo espec&iacute;fico e para fazer a
					nossa pr&oacute;pria pergunta &eacute; meio que "burocratico" e demora muito para se ter uma resposta.
				</div>
			</div>
			<div class="row flex-row-reverse">
				<div class="col-lg-6 py-4">Nos grupos de programa&ccedil;&atilde;o do Facebook os Dev's tem suas tarefas do
					dia-a-dia, n&atilde;o podem dedicar-se totalmente a quem est&aacute; atr&aacute;s de uma
					solu&ccedil;&atilde;o para seu c&oacute;digo.</div>
			</div>
			<div class="row">
				<div class="col-lg-6 py-4">Com esta necessidade n&oacute;s desenvolvemos uma plataforma para unir
				programadores que est&atilde;o precisando de socorro e outros que querem ganhar uma grana extra por
				fazerem o que gostam.</div>
			</div>
			<div class="row flex-row-reverse">
				<div class="col-lg-6 py-4">Funciona assim: ao ter uma d&uacute;vida que voc&ecirc; n&atilde;o encontra
				solu&ccedil;&atilde;o em lugar nenhum, corra para o AskDev e publique sua pergunta, juntamente com um
				pequeno valor que voc&ecirc; est&aacute; disposto a pagar pela solu&ccedil;&atilde;o dessa
				pergunta(m&iacute;nimo de R$0,50).</div>
			</div>
			<div class="row">
				<div class="col-lg-6 py-4">Programadores ver&atilde;o sua pergunta e aqueles que se julgarem aptos a lhe a
				ajudar, o far&atilde;o uma proposta com base no valor que voc&ecirc; estipulou.</div>
			</div>
			<div class="row flex-row-reverse">
				<div class="col-lg-6 py-4">Ent&atilde;o voc&ecirc; analisa as propostas, escolhe uma, efetua o pagamento via
				boleto ou cart&atilde;o de cr&eacute;dito(tudo feito pelo MercadoPago), e voc&ecirc;s j&aacute; podem
				come&ccedil;ar a trabalhar para solucionar a d&uacute;vida. Ter&aacute; espa&ccedil;o subir seu trecho
				de c&oacute;digo, o projeto todo, integra&ccedil;&atilde;o com GitHub, Plunker e etc&hellip;</div>
			</div>
			<div class="row">
				<div class="col-lg-6 py-4">O dinheiro s&oacute; ser&aacute; liberado a quem est&aacute; ajudando, quando o
				ajudado informar que sua d&uacute;vida foi solucionada de fato.</div>
			</div>
			<div class="row flex-row-reverse">
				<div class="col-lg-6 py-4">Seu dinheiro ficar&aacute; em seguran&ccedil;a, quando acionados n&oacute;s
				arbitramos e tentamos chegar a um acordo.</div>
			</div>
			<div class="row">
				<div class="col-lg-6 py-4">E o mais legal &eacute; que voc&ecirc; pode ser um ajudante ou um ajudado, ajude
				outros programadores em apuros e fique com saldo positivo em sua conta, use esse saldo para solucionar
				futuras d&uacute;vidas ou saque o valor.</div>
			</div>
		</article>
	</div>
</div>
@endsection
