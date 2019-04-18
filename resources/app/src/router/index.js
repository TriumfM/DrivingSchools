import Vue from 'vue'
import Router from 'vue-router'

import AppView from '@/main/AppView'


Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'app',
      component: AppView
    }
  ]
})
