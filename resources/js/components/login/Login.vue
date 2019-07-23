<template>
  <div>
    <v-form @submit.prevent="login">
      <v-container>
        
        <span class="red--text" v-if="errors.email">{{errors.email.message}}</span>
        <v-text-field
                label="E-mail*"
                type="email"
                v-model="form.email"
        >
        </v-text-field>
        
        <span class="red--text" v-if="errors.password">{{errors.password.message}}</span>
        <v-text-field
                label="Password*"
                type="password"
                v-model="form.password"
        >
        </v-text-field>
        
        <v-btn
                color="grey"
                type="submit"
        >Login
        </v-btn>
        <router-link to="/signup">
          <v-btn flat>Signup</v-btn>
        </router-link>
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
					email: 'vhintz@example.net',
					password: 'password'
				},

				errors: {},

			}
		},
		/**
		 * hook to call before the component is created.
		 * Note: hook, NOT a method.
		 * */
		created() {
			if (User.isLoggedIn()) {
				router.push('questions');
			}
		},
		methods: {
			async login() {
				if (!this.validateForm()) {
					return false;
				}

				if (!await User.login(this.form)) {
					console.log('cannot login, you failed.')
				} else {
					// console.log(User.retrieve());
					console.log('You successfully logged in');
					// router.push('questions');
					window.location = '/questions'

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

				if (!form.password) {
					this.$set(this.errors, 'password', {message: 'Password field is required'});
					is_ok = false;
				}

				return is_ok;
			},
			/**
			 * @return {boolean}
			 */
			validateEmail(email) {
				let re = /.@./;
				return re.test(email);
			},


		}

	}
</script>

<style scoped>

</style>