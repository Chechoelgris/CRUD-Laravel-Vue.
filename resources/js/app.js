/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('crearylistarnota-component', require('./components/notas/CreateAndListNotasComponent.vue').default);
Vue.component('crearylistarpersonaje-component', require('./components/personajes/CreateAndListCharacterComponent.vue').default);
Vue.component('personaje-component', require('./components/personajes/ShowCharacterComponent.vue').default);
Vue.component('crear-personaje-form', require('./components/personajes/AddCharacterComponent.vue').default);

Vue.component('spinner-load', require('./components/utilidades/SpinnerComponent.vue').default);


const app = new Vue({
    el: '#app',
});
