// Import components for the purposes of this project
import Register from './components/Register.vue';
import Login    from './components/Login.vue';
import Tasks    from './components/Tasks.vue';

// REQUIRE
window.axios = require('axios');

// ROUTES
let routes = [
    {
        path: '/register',
        component: Register
    },
    {
      path: '/login',
      component: Login
    },
    {
      path: '/tasks',
      component: Tasks
    }
];

// ROUTER
const router = new VueRouter({
    routes
})

// MOUNT THE APP
const app = new Vue({
    router
}).$mount('#app')
