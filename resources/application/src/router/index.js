import Vue from 'vue'
import Router from 'vue-router'

import MainViewComponent from '@/main/MainViewComponent'
import HomeComponent from '@/main/home/HomeComponent'
import TestComponent from '@/main/test/TestComponent'
import TestDetailsComponent from '@/main/test/TestDetailsComponent'
import TestResultsComponent from '@/main/test/TestResultsComponent'
import LoginComponent from '@/user/LoginComponent'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'main',
      component: MainViewComponent,
      children: [
        {
          path: '/home',
          name: 'home',
          component: HomeComponent,
        },
        {
          path: '/test',
          name: 'test',
          component: TestComponent,
        },
        {
          path: '/test/1',
          name: 'test-details',
          component: TestDetailsComponent,
        },
        {
          path: '/test/1/results',
          name: 'test-results',
          component: TestResultsComponent,
        },
      ]
    },
    {
      path: '/login',
      name: 'login',
      component: LoginComponent
    }
  ]
})
