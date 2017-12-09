
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('vue-attendance', require('./components/Attendance.vue'));
Vue.component('vue-attendance-sum', require('./components/SumOfAttendance.vue'));
Vue.component('vue-locker', require('./components/Locker.vue'));
Vue.component('vue-attendance-chart', require('./components/AttendanceChart.vue'));
Vue.component('vue-user-data', require('./components/UserData.vue'));

window.eventBus = new Vue ();

const app = new Vue({
    el: '#panel_container'
});
