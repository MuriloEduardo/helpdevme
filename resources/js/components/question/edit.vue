<template>
	<form :action="'/questions/' + question.slug" method="POST">
		<input name="_method" type="hidden" value="PUT" />
		<Form :question="question" />
	</form>
</template>
<script>
import Form from './form';

export default {
	props: ['question'],
	components: {
		Form
	}
};
</script>
