import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../components/login/Login'
import Signup from '../components/login/Signup'
import Logout from '../components/login/Logout'
import Questions from '../components/questions/Questions'
import SingleQuestion from '../components/questions/SingleQuestion'
import AskQuestion from '../components/questions/AskQuestion'
import Categories from '../components/categories/Categories'

Vue.use(VueRouter);


const routes = [
	{ path: '/login', name:'login', component: Login },
	{ path: '/signup', name:'signup', component: Signup },
	{ path: '/logout', name:'logout', component: Logout },
	{ path: '/questions', name:'questions', component: Questions },
	{ path: '/askQuestion', name:'askQuestion', component: AskQuestion },
	{ path: '/singleQuestion', name:'singleQuestion', component: SingleQuestion },
	{ path: '/categories', name:'categories', component: Categories },
	// { path: '/categories', component: Categories },
];

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
	routes, // short for `routes: routes`
	mode: 'history',
});



export default router;