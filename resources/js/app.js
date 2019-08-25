/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('crud-nota', require('./components/notas/CrudNotas.vue').default);

Vue.component('show-character', require('./components/personajes/Show.vue').default);
Vue.component('create-character', require('./components/personajes/Add.vue').default);
Vue.component('show-races', require('./components/personajes/PopulateRaces.vue').default);

Vue.component('spinner-load', require('./components/utilidades/SpinnerComponent.vue').default);


const app = new Vue({
    el: '#app',
});
