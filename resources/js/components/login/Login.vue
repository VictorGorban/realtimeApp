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

	import {AxiosInstance as axios} from "axios";

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
			login(){
				axios.post('/api/auth/login', this.form)
            .then(res=> {console.log(res.data); localStorage.setItem('jwt', res.data.access_token)})
            .catch(error=> console.log(error.response.data))
      }
    }

	}
</script>

<style scoped>

</style>