<template>
  <div class="main__container">
    <header-navigation>
      <router-link :class="{'menu__item': true, 'active': ($route.name == 'test')}" :to="{name: 'test'}">Testohu</router-link>
      <router-link :class="{'menu__item': true, 'active': ($route.name == 'video')}" :to="{name: 'video'}">Video</router-link>
      <router-link :class="{'menu__item': true, 'active': ($route.name == 'literature')}" :to="{name: 'literature'}">Literatura</router-link>
      <button class="menu__item" :to="{name: 'login'}" @click="logout()">Log Out</button>
    </header-navigation>
    <router-view class="main__body"></router-view>
  </div>
</template>

<script>

  import HeaderNavigation from '@/partials/HeaderNavigation'
  import {Http} from '@/helpers/http-helper'
  import {store} from '../store'

  export default {
    name: 'MainView',
    components: {
      HeaderNavigation
    },
    data () {
      return {
      }
    },
    mounted: function () {
      if(store.state.authStore.token.user.role == 'admin') {
        this.$router.push({name: 'admin-users'})
      } else {
        this.$router.push({name: 'test'})
      }
    },
    methods: {
      logout: function () {
        Http.get(`/auth/logout`)
          .then(response => {
            this.$router.push({name: 'login'})
          })
      }
    }
  }
</script>
