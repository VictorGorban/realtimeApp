<template>
  <v-toolbar>
    <v-toolbar-title>Realtime</v-toolbar-title>
    <v-spacer></v-spacer>
    
    <div>
    
      <router-link to="/questions">
        <v-btn flat>Questions</v-btn>
      </router-link>
      <router-link to="/askQuestion">
        <v-btn flat>Ask</v-btn>
      </router-link>
      <router-link to="/categories">
        <v-btn flat>Categories</v-btn>
      </router-link>
      <router-link to="/login">
        <v-btn flat>Login/Signup</v-btn>
      </router-link>
    </div>
  </v-toolbar>
</template>

<script>
	export default {
		name: "toolbar"
	}
</script>

<style scoped>

</style>