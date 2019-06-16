<template>
  <div id="app">
    <router-view/>
  </div>
</template>

<script>

  import {Http} from '@/helpers/http-helper'
  import {store} from '@/store'

  export default {
    name: 'app',
    computed: {
      route () {
        return this.$route.path
      }
    },
    components: {
    },
    mounted: function () {
      if (localStorage.getItem('vuex') === '') {
        this.$router.push('login')
      }
      if (localStorage.getItem('vuex') === null) {
        localStorage.setItem('vuex', '')
        this.$router.push('login')
      }
    },
    watch: {
      route: function () {
        if (localStorage.getItem('vuex') === '') {
          this.$router.push('login')
        }
        if (localStorage.getItem('vuex') === null) {
          localStorage.setItem('vuex', '')
          this.$router.push('login')
        }
      }
    },
    methods: {
    }
  }
</script>
