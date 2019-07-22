<template>
  <div>
    <v-form @submit.prevent="login">
      <v-container>
        <v-text-field
                label="E-mail"
                type="email"
                v-model="form.email"
                required>
          
        </v-text-field>
        
        <v-text-field
                label="Password"
                type="password"
                v-model="form.password"
                required>
        </v-text-field>
        
        <v-btn
                color="grey"
                type="submit"
        >Login
        </v-btn>
      </v-container>
    </v-form>
  
  </div>


</template>

<script>

 
	export default {
		data() {
			return {
				form: {
					email: 'vhintz@example.net',
					password: 'password'
				}
			}
		},
    methods:{
			async login(){
				if (! await User.login(this.form)){
					alert('cannot login, you failed.')
        }
				else{
					console.log(User.retrieve());
					console.log('You successfully logged in');
        }
      }
    }

	}
</script>

<style scoped>

</style>