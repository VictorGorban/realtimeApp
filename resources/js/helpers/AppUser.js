/**
 * Class-helper for managing user login/signup part. Also represents the user.
 */
class AppUser {

	constructor() {
		this.storageKey = 'appUser';
	}

	logout(){
		console.log('in user.logout')

		this.clear();
	}

	login(credentials) {
		return axios.post('/api/auth/login', credentials)
				.then(res => {
					let obj = {
						email: credentials.email,
						username: res.data.username,
						id: res.data.user_id,
						jwt: res.data.access_token,
					};

					this.store(obj);
					return true;
				})
				.catch(error => {
					console.log(error);
					return false;
				})
	}



	signup(credentials) {
		// credentials = {
		// 	email: 'vg32@ya.ru',
		// 	password: 'password',
		// 	name: 'Victor Gorban',
		// };
		return axios.post('/api/auth/signup', credentials)
				.then(res => {
					let obj = {
						email: credentials.email,
						username: res.data.username,
						id: res.data.user_id,
						jwt: res.data.access_token,
					};

					this.store(obj);
					return true;
				})
				.catch(error => {
					console.log(error);
					return false;
				})
	}

	/**
	 *
	 * @param {object} dataToStore
	 */
	store(dataToStore) {
		localStorage.setItem(this.storageKey, JSON.stringify(dataToStore));
	}

	/**
	 * retrieves user data from localStorage. if none stored, returns null
	 * @return {object}|{null}
	 */
	retrieve() {
		let data = {};

		try {
			data = JSON.parse(localStorage.getItem(this.storageKey));
		} catch (e) {
			console.log(e);
		} finally {
			// console.log(data)
		}

		return data;
	}

	/**
	 * clears localStorageEntry
	 */
	clear() {
		localStorage.removeItem(this.storageKey);
	}

	/**
	 * @return boolean
	 */
	hasId() {
		let data = this.retrieve();
		return data === null ? false : data.hasOwnProperty('id');
// if id then return true
	}

	/**
	 * @return boolean
	 */

	hasToken() {
		let data = this.retrieve();
		return data === null ? false : data.hasOwnProperty('jwt');
// if token then return true
	}


	isLoggedIn() {
		// console.log('in user.isLoggedIn')
		// try {
			return this.hasToken() && this.hasId();
		// }
		// catch (e) {
		// 	console.log(e);
		// }
	}
}


export default AppUser = new AppUser();