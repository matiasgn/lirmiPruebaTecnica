require('./bootstrap');

window.Vue = require('vue');


Vue.component('user-component', require('./components/UserComponent.vue').default);

Vue.component('saved-user-component', require('./components/SavedUsers.vue').default);




const app = new Vue({
    el: '#app',
});
