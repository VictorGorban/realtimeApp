class AppUser {

	constructor() {
		this.storageKey = 'appUser';
		this.email = null;
		this.id = null;
		this.name = null;
		this.jwt = null;
	}

	login(credentials) {
		return axios.post('/api/auth/login', credentials)
				.then(res => {
					let obj = {
						email: credentials.email,
						name: res.data.username,
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
		this.set(dataToStore);
	}

	/**
	 * set data of this user
	 * @param data {object} of {email, name, user_id, jwt}
	 */
	set(data) {
		let id = data.id;
		if (data.user_id!==undefined){
			id = data.user_id;
		}
		this.email = data.email;
		this.name = data.name;
		this.id = id;
		this.jwt = data.jwt;
	}

	/**
	 * retrieves user data from localStorage.
	 * @return {object}
	 */
	retrieve() {
		const data = JSON.parse(localStorage.getItem(this.storageKey));
		this.set(data);

		return data;
	}

	/**
	 * clears localStorageEntry
	 */
	clear() {
		localStorage.removeItem(this.storageKey);
		this.set({});
	}

	/**
	 * @return bool
	 */
	hasId() {
		this.retrieve();
		let id = this.id;
		return !!id;
// if id then return true
	}

	/**
	 * @return bool
	 */

	hasToken() {
		this.retrieve();
		let token = this.jwt;
		return !!token;
// if token then return true
	}


	isLoggedIn() {
		return this.hasToken();
	}
}


export default AppUser = new AppUser();