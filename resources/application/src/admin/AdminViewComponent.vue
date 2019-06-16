<template>
  <div class="admin">
    <left-menu></left-menu>
    <router-view :class="{'admin__container':true, 'col-md-12':true}"></router-view>
  </div>
</template>

<script>

  import LeftMenu from '@/partials/LeftMenuAdmin'
  import {Http} from '@/helpers/http-helper'
  import {store} from '../store'

  export default {
    name: 'app',
    computed: {
      route () {
        return this.$route.path
      }
    },
    components: {
      LeftMenu
    },
    mounted () {
      if(store.state.authStore.token.user.role == 'student') {
        this.$router.push({name: 'test'})
      } else {
        this.$router.push({name: 'admin-users'})
      }
    },
    methods: {
    },
    watch: {
    }
  }
</script>
