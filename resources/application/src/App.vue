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
      // this.userData()
      // if (localStorage.getItem('vuex') !== '' || localStorage.getItem('vuex') === undefined) {
      //   if(this.user_.role == 'student') {
      //     this.$router.push({name: 'main'})
      //   }
      //   if(this.user_.role == 'admin') {
      //     this.$router.push({name: 'admin'})
      //   }
      // } else {
      //   if (localStorage.getItem('vuex') == '' ) {
      //     this.$router.push('login')
      //   }
      //   if (localStorage.getItem('vuex') == null) {
      //     localStorage.setItem('vuex', '')
      //     this.$router.push('login')
      //   }
      // }

    },
    watch: {
      // route: function () {
      //   if (this.$route.path === '/') {
      //     this.$router.push('test')
      //   }
      // }
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
