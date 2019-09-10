<template>
	<form action="/questions" method="POST">
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
