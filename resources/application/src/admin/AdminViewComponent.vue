<template>
  <div class="admin">
    <left-menu></left-menu>
    <router-view :class="{'admin__container':true, 'col-md-12':true}"></router-view>
  </div>
</template>

<script>

  import LeftMenu from '@/partials/LeftMenuAdmin'
  import {Http} from '@/helpers/http-helper'

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
      this.$router.push({name: 'admin-users'})
    },
    methods: {
    }
    // watch: {
    //   mounted: function () {
    //     if (localStorage.getItem('vuex') == '') {
    //       this.$router.push('login')
    //     }
    //     if (localStorage.getItem('vuex') == null) {
    //       localStorage.setItem('vuex', '')
    //       this.$router.push('login')
    //     }
    //   },
    //   watch: {
    //     route: function () {
    //       if (this.$route.path == '/') {
    //         this.$router.push('clients')
    //       }
    //     }
    //   }
    // }
  }
</script>
