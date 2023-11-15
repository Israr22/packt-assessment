import './bootstrap';
import {createApp } from 'vue';
import app from './App.vue';
import router from './routes.js';
createApp(app).use(router).mount("#app");

