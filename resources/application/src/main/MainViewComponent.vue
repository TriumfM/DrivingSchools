<template>
  <div class="main__container">
    <header-navigation></header-navigation>
    <router-view class="main__body"></router-view>
  </div>
</template>

<script>

  import HeaderNavigation from '@/partials/HeaderNavigation'
  import {Http} from '@/helpers/http-helper'

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
      this.userData()
    },
    methods: {
      userData () {
        Http.get(`auth/details`)
          .then(response => {
            store.commit('authStore/setUser', response.data)
          })
      }
    }
  }
</script>
