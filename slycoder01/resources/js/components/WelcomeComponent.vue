<template>
	<div class="col-md-6" id="WelcomeBanner">
		<h1 class="animated flipInX delay-1s">
			Welcome to <br />
			Slycoder.com
		</h1>
	</div>
</template>

<script>
export default {
	mounted() {
		//console.log('Component mounted.');
		//console.log({{ asset('images/webpic1.jpg') }});
	}
};
</script>

<style>
#WelcomeBanner {
	background: url('/images/webpic1.jpg');
	background-size: cover;
	background-position: center;
	padding: 1rem;

	font-size: 2rem;
	margin-bottom: 0;
	color: var(--light);
}
</style>
