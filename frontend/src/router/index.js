import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Section from '../views/Section'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/section/:id',
    name: 'section',
    component : Section
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
