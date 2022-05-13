require('./bootstrap');

import { createApp } from 'vue'

import Form from "./form";
window.Form = Form;
// Vue.component('employee-component', require('./components/employees/Index.vue').default);

import App from "./components/App.vue"; 
import router from "./router";

const app = createApp(App);
app.use(router).mount("#app");
