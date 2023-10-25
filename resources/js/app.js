require('./bootstrap')
import Vue from 'vue';
import Buefy from 'buefy';

Vue.use(Buefy);

export const EventBus = new Vue();

Vue.component('task', () => import('./components/tasks/Task'));
Vue.component('tasks', () => import('./components/tasks/Tasks'));
Vue.component('flash', () => import('./components/Flash'));
Vue.component('spending', () => import('./components/Spending'));
Vue.component('task-form', () => import('./components/tasks/TaskForm'));
Vue.component('type-activities-list', () => import('./components/TypeActivitiesList'));
Vue.component('data-table', () => import('./components/DataTable'));
Vue.component('general-form', () => import('./components/GeneralForm'));
Vue.component('months-bar', () => import('./components/MonthsBar'));
Vue.component('monthly-view', () => import("./components/MonthlyView.vue"));
Vue.component('feed-view', () => import("./components/feed/FeedView.vue"));

new Vue({
    el: '#app'
});
