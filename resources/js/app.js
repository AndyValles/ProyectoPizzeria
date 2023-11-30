require('./bootstrap');
import { createApp } from 'vue';
window.Vue = require('vue');

const app=createApp({});

import pagination from "./components/pagination.vue";

app.component("pagination",pagination);
app.mount("#app");

