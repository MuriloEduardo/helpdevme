<template>
	<form @submit.prevent="onSubmit">
		<b-input-group class="border rounded-pill p-1 bg-white">
			<b-form-input
				class="border-0"
				placeholder="Oi, eu sei solucionar isso!"
				v-model="body"
				autofocus
				required
			></b-form-input>

			<b-input-group-append>
				<b-dropdown
					variant="outline-success rounded-pill mx-1"
					v-b-tooltip.hover
					title="Adicionar Orçamento"
					right
					slot="append"
				>
					<template slot="button-content">
						<div v-if="!budget" class="d-flex align-items-center">
							<i class="fas fa-dollar-sign mr-2"></i>
							<small>Proposta</small>
						</div>
						<span v-else>{{ budget | currency }}</span>
					</template>
					<b-dropdown-form>
						<b-form-group label="Orçamento" label-for="dropdown-form-budget" @submit.stop.prevent>
							<b-input-group prepend="R$">
								<b-form-input id="dropdown-form-budget" v-model="budget" placeholder="2,50"></b-form-input>
							</b-input-group>
						</b-form-group>
					</b-dropdown-form>
				</b-dropdown>
				<b-button variant="primary" type="submit" class="rounded-pill" v-b-tooltip.hover title="Enviar">
					<i v-if="!loading" class="fas fa-paper-plane"></i>
					<b-spinner v-else small type="grow"></b-spinner>
				</b-button>
			</b-input-group-append>
		</b-input-group>
	</form>
</template>
<script>
import { mapActions } from 'vuex';

export default {
	props: ['question', 'comment'],
	data() {
		return {
			loading: false,
			body: '',
			budget: 2.5
		};
	},
	methods: {
		...mapActions('questions', ['addComment', 'closetFormEditComment']),
		onSubmit() {
			this.loading = true;

			this.addComment({
				type: 1, // comment
				body: this.body,
				budget: this.budget,
				question_id: this.question.id,
				receiver_id: this.question.user_id
			}).then(response => {
				this.loading = false;

				if (response.status === 200) {
					this.$bvToast.toast('Comentário enviado!', {
						title: 'Proposta Melhorada!',
						variant: 'success',
						solid: true
					});

					this.closetFormEditComment(this.question.id);
				} else {
					this.$bvToast.toast(
						'Tente novamente de uma forma diferente!',
						{
							title: 'Algo deu errado!',
							variant: 'danger',
							solid: true
						}
					);
				}
			});
		}
	},
	mounted() {
		this.body = this.comment.body;
		this.budget = this.comment.budget;
	}
};
</script>
