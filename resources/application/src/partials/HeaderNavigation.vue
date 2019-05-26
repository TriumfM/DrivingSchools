<template>
  <div class="header">
    <img class='logo' src="@/assets/img/logo.png"/>
    <div class="menu__items">
      <router-link :class="{'menu__item': true, 'active': ($route.name == 'test')}" :to="{name: 'test'}">Testohu</router-link>
      <router-link :class="{'menu__item': true, 'active': ($route.name == 'video')}" :to="{name: 'video'}">Video</router-link>
      <router-link :class="{'menu__item': true, 'active': ($route.name == 'literature')}" :to="{name: 'literature'}">Literatura</router-link>
      <button class="menu__item" :to="{name: 'login'}" @click="logout()">Log Out</button>
    </div>
  </div>
</template>

<script>
  import {Http} from '@/helpers/http-helper'

  export default {
    props: [],
    data () {
      return {
        routes: [],
        user: {}
      }
    },
    filters: {
      firstLetter: function (value) {
        if (!value) return ''
        value = value.toString()
        return value.charAt(0)
      }
    },
    watch: {
    },
    mounted: function () {
      this.getUser()
    },
    methods: {
      logout: function () {
        localStorage.setItem('vuex', '')
        this.$router.push({name: 'login'})
        Http.get(`/auth/logout`)
      },
      getUser: function () {
        Http.get(`auth/details`)
          .then(response => {
            this.user = response.data
          })
      }
    }
  }

</script>
