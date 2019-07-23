<template>
  <h1>You are logged out.</h1>
</template>

<script>
	import router from "../../router/router";

	export default {
		router,
    beforeCreate() {
    	User.logout();
    	// router.push('questions')
      window.location = '/questions'
		}
	}
</script>

<!--<template>-->
<!--  <div>-->
<!--  -->
<!--  </div>-->
<!--</template>-->

<!--<script>-->
<!--	export default {-->
<!-- -->
<!--	}-->
<!--</script>-->

<!--<style scoped>-->

<!--</style>-->