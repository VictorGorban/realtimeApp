<template>
  <div>
    <v-form @submit.prevent="signup">
      <v-container>
        
        <span class="red--text" v-if="errors.email">{{errors.email.message}}</span>
        <v-text-field
                label="E-mail*"
                type="email"
                v-model="form.email"
        >
        
        </v-text-field>
  
        <span class="red--text" v-if="errors.name">{{errors.name.message}}</span>
  
        <v-text-field
                label="Username*"
                type="text"
                v-model="form.name"
        >
        
        </v-text-field>
  
        <span class="red--text" v-if="errors.password">{{errors.password.message}}</span>
  
        <v-text-field
                label="Password*"
                type="password"
                v-model="form.password"
        >
        </v-text-field>
  
        <span class="red--text" v-if="errors.password_confirmation">{{errors.password_confirmation.message}}</span>
  
        <v-text-field
                label="Confirm password*"
                type="password"
                v-model="form.password_confirmation"
        >
        </v-text-field>
        
        <router-link to="/login">
          <v-btn flat>Login</v-btn>
        </router-link>
        
        <v-btn
                color="grey"
                type="submit"
        >Signup
        </v-btn>
      </v-container>
    </v-form>
  
  </div>


</template>

<script>


	import router from "../../router/router";

	export default {
		router,
		data() {
			return {
				form: {
					email: 'VictorGorban2@ya.ru',
					name: 'John Doe',
					password: 'password',
					password_confirmation: 'password',
				},

				errors: {},
			}
		},
		methods: {
			async signup() {
				if (!this.validateForm()) {
					return false;
				}

				if (!await User.signup(this.form)) {
					console.log('cannot signup, you failed.')
				} else {
					// console.log(User.retrieve());
					console.log('You successfully logged in');
					router.push('questions');

				}
			},

			/**
			 * @return {boolean}
			 */
			validateForm() {
				this.errors = {};
				
				let is_ok = true;
				let form = this.form;
				if (!form.email) {
          this.$set(this.errors, 'email', {message: 'Email field is required'});
					is_ok = false;
				} else if (!this.validateEmail(form.email)) {
					this.$set(this.errors, 'email', {message: 'Email field is in improper format'});
					is_ok = false;
				}

				if (!form.name) {
					this.$set(this.errors, 'name', {message: 'Name field is required'});
					is_ok = false;
				}

				if (!form.password) {
					this.$set(this.errors, 'password', {message: 'Password field is required'});
					is_ok = false;
				}

				if (!form.password === form.password_confirmation) {
					this.$set(this.errors, 'password_confirmation', {message: 'Passwords don\'t equal'});
					is_ok = false;
				}

				return is_ok;
			},

			validateEmail(email) {
				let re = /.@./;
				return re.test(email);
			}
		}

	}
</script>

<style scoped>
</style>