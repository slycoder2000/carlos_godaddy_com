<template>
	<ul class="navbar-nav mr-auto">
		<li class="nav-item"><a class="nav-link" href="/">Home</a></li>
		<li class="nav-item"><a class="nav-link" href="/about">About</a></li>
		<li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
		<li class="nav-item"><a class="nav-link" href="/webapps">Apps</a></li>
		<!--li><a href="resume.php">Resume</a></!li>
        <li><a href="clients.php">Clients</a></li-->
		<li class="nav-item"><a class="nav-link" href="/resources">Resources</a></li>
	</ul>
</template>

<script>
export default {
	data: function() {
		return {};
	}
};
</script>

<styles>

.bounce-enter-active {
  animation: bounce-in .5s;
}
.bounce-leave-active {
  animation: bounce-in .5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.5);
  }
  100% {
    transform: scale(1);
  }
}
</styles>
