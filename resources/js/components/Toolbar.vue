<template>
  <v-toolbar>
    <v-toolbar-title>Realtime</v-toolbar-title>
    <v-spacer></v-spacer>
    
    <div>
      <router-link
              v-for="item in items"
              :key="item.title"
              :to="item.to"
              v-if="item.show"
      >
        <v-btn flat>
          {{item.title}}
        </v-btn>
      </router-link>
    
    </div>
  </v-toolbar>
</template>

<script>
	export default {
		
		data() {
			return {
			  items:[
					{title: 'Questions', to: '/questions', show: true},
					{title: 'Ask question', to: '/askQuestion', show: true},
					{title: 'Categories', to: '/categories', show: true},
					//  only F5.
					{title: 'Login/Signup', to: '/login', show: /*true*/!User.isLoggedIn()},
					{title: 'Log out', to: '/logout', show: /*true*/User.isLoggedIn()},
				],
			}
		},
    
    computed:{
			
    }
  
	}
</script>

<style scoped>

</style>