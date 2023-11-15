// frontend/src/router/index.js
import { createRouter, createWebHistory } from 'vue-router';
import Index from './Pages/Index.vue';
import BookCreate from './Pages/Add.vue';
import BookEdit from './Pages/Edit.vue';
import NotFound from './Pages/NotFound.vue';
import BookView from './Pages/View.vue';

const routes = [
  {
    path: '/',
    name: 'Index',   
    component: Index,
  },
  {
    path: '/book/:id',
    name: 'bookView',
    component : BookView,
  },
  {
    path: '/book/:id/edit',
    name: 'bookEdit',
    component: BookEdit,
  },
  {
    path: '/book/add',
    name: 'bookAdd',
    component: BookCreate
  },
  {
    path: '/not-found',
    name: 'NotFound',
    component: NotFound
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
