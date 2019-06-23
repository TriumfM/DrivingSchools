<template>
  <div class="header">
    <img class='logo' src="@/assets/img/logo.png"/>
    <div class="menu__items">
      <slot></slot>
    </div>
  </div>
</template>

<script>
  import {Http} from '@/helpers/http-helper'

  export default {
    props: [],
    data () {
      return {
        routes: []
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
    },
    methods: {
      logout: function () {
        localStorage.setItem('vuex', '')
        this.$router.push({name: 'login'})
        Http.get(`/auth/logout`)
      },
    }
  }

</script>
