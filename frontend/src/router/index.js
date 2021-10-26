import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

  const routes = [
    {
      path: '/home',
      name: 'home',
      component: () => import('../views/Home'),
    },
    {
      path: '/plantsgrid/:searchQuery',
      name: 'PlantsGrid',
      props: true,
      component: () => import('../views/PlantsGrid'),
    },
    {
      path: '/maintenancegrid',
      name: 'MaintenanceGrid',
      component: () => import('../views/MaintenanceGrid'),
    },
    {
      path: '/cart',
      name: 'Cart',
      component: () => import('../views/Cart'),
    },
    {
      path: '/plant/:id',
      name: 'Plant',
      props: true,
      component: () => import('../views/Plant')
    },
    {
      path: '/authtest',
      name: 'AuthTest',
      component: () => import('../views/AuthTest')
    },
    {
      path: '/contactus',
      name: 'ContactUs',
      component: () => import('../views/ContactUs')
    },
    {
      path: '/',
      name: 'Landing',
      component: () => import('../views/Landing')
    }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
