import './bootstrap';
import { createApp } from 'vue';
// import the root component App from a single-file component.
import router from "./router";
import Notifications from 'notiwind'
import App from './App.vue';

const app = createApp(App);
app.use(router);
app.use(Notifications);
app.mount('#app')

