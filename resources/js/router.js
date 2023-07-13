import { createRouter, createWebHistory } from "vue-router";
import Home from './pages/Home.vue'
import Restaurants from './pages/Restaurants.vue'
import Dishes from './pages/Dishes.vue'
import Error404 from './pages/Error404.vue'
const router = createRouter({

  history: createWebHistory(),
  linkExactActiveClass: 'active',   // chiamo semplicemente active la classe predefinita delle rotte di vue in active

routes:[
    {
    path: '/',
    name: 'home',
    component: Home
    },
    {
    path: '/restaurants',
    name: 'restaurants',
    component: Restaurants
    },
    {
    path: '/dishes',
    name: 'dishes',
    component: Dishes
    },

    // Pagina Error 404
    {
    path: '/:pathMatch(.*)*',
    component: Error404
    }
  ]
})
export { router }
