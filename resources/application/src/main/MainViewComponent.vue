<template>
  <div class="main__container">
    <header-navigation></header-navigation>
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
    }
  }
</script>
