import Vue from 'vue';
import App from './App.vue';
import Router from './routes.js';
import vueResource from 'vue-resource';
import { ValidationProvider,ValidationObserver, extend } from 'vee-validate/dist/vee-validate.full';

Vue.use(vueResource);
Vue.component('ValidationProvider',ValidationProvider);

import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;
import 'bootstrap';
import 'popper.js';

import 'bootstrap/dist/css/bootstrap.css';


new Vue({
  el: '#app',
  render: h => h(App),
  router:Router,
  ValidationProvider
})

const ruleObject = { required: true, email: true };