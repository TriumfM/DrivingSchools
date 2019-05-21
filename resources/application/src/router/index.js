import Vue from 'vue'
import Router from 'vue-router'

import MainViewComponent from '@/main/MainViewComponent'
import HomeComponent from '@/main/home/HomeComponent'
import TestComponent from '@/main/test/TestComponent'
import TestDetailsComponent from '@/main/test/TestDetailsComponent'
import TestResultsComponent from '@/main/test/TestResultsComponent'
import VideoComponent from '@/main/video/VideoComponent'
import LiteratureComponent from '@/main/literature/LiteratureComponent'
import LoginComponent from '@/user/LoginComponent'

import AdminViewComponent from '@/admin/AdminViewComponent'
import AdminUsersComponent from '@/admin/users/AdminUsersComponent'
import AdminTestsComponent from '@/admin/tests/AdminTestsComponent'
import AdminVideosComponent from '@/admin/videos/AdminVideosComponent'
import AdminLiteratureComponent from '@/admin/literature/AdminLiteratureComponent'


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
        {
          path: '/video',
          name: 'video',
          component: VideoComponent,
        },
        {
          path: '/literature',
          name: 'literature',
          component: LiteratureComponent,
        },
      ]
    },
    {
      path: '/admin',
      name: 'admin',
      component: AdminViewComponent,
      children: [
        {
          path: '/admin/users',
          name: 'admin-users',
          component: AdminUsersComponent,
        },
        {
          path: '/admin/tests',
          name: 'admin-tests',
          component: AdminTestsComponent,
        },
        {
          path: '/admin/videos',
          name: 'admin-videos',
          component: AdminVideosComponent,
        },
        {
          path: '/admin/literature',
          name: 'admin-literature',
          component: AdminLiteratureComponent,
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
