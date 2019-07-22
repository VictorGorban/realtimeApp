<template>
  <div>
    <toolbar>
<!--      <router-link to="/bar">Go to Bar</router-link>-->
    </toolbar>
    
    <router-view></router-view>
    
    
    
    <app-footer>
    
    </app-footer>
  </div>
</template>

<script>
	import toolbar from './Toolbar';
	import login from './login/Login';
	// import app-footer from './Toolbar';
	import AppFooter from './AppFooter';


	export default {
		components: {
					toolbar,
			AppFooter,
      login
				}
	}
</script>

<style scoped>

</style>