import Vue from 'vue'
import Router from 'vue-router'

import MainViewComponent from '@/main/MainViewComponent'
import HomeComponent from '@/main/home/HomeComponent'
import TestComponent from '@/main/test/TestComponent'
import TestDetailsComponent from '@/main/test/TestDetailsComponent'
import TestResultsComponent from '@/main/test/TestResultsComponent'
import VideoComponent from '@/main/video/VideoComponent'
import LiteratureComponent from '@/main/literature/LiteratureComponent'
import LiteratureDetailsComponent from '@/main/literature/LiteratureDetailsComponent'
import LoginComponent from '@/user/LoginComponent'

import AdminViewComponent from '@/admin/AdminViewComponent'
import AdminUsersComponent from '@/admin/users/AdminUsersComponent'
import AdminTestsComponent from '@/admin/tests/AdminTestsComponent'
import AdminVideosComponent from '@/admin/videos/AdminVideosComponent'
import AdminLiteratureComponent from '@/admin/literature/AdminLiteratureComponent'
import AdminTestQuestionsComponent from '@/admin/tests/QuestionsTestComponent'
import AdminMesagesComponent from '@/admin/messages/AdminMesagesComponent'

import WebViewComponent from '@/web-site/WebViewComponent'

Vue.use(Router)

export default new Router({
  // mode: 'history',
  // hash: false,
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
          path: '/test/:id',
          name: 'test-details',
          component: TestDetailsComponent,
        },
        {
          path: '/test/results',
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
        {
          path: '/literature/:type',
          name: 'literature-type',
          component: LiteratureDetailsComponent,
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
          path: '/admin/questions/:testId',
          name: 'admin-questions',
          component: AdminTestQuestionsComponent,
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
        {
          path: '/admin/messages',
          name: 'admin-messages',
          component: AdminMesagesComponent,
        }
      ]
    },
    {
      path: '/web',
      name: 'web',
      component: WebViewComponent,
    },
    {
      path: '/login',
      name: 'login',
      component: LoginComponent
    },
  ]
})
