<template>
  <div class="header">
    <img class='logo' src="@/assets/img/logo.png" @click=""/>
    <div class="menu__items">
      <slot></slot>
    </div>
    <div class="nav_icon">
      <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.13 15.48">
        <line class="cls-1" x1="6.91" y1="7.74" x2="22.88" y2="7.74" />
        <line class="cls-1" x1="1.25" y1="1.25" x2="22.88" y2="1.25" />
        <line class="cls-1" x1="1.25" y1="14.23" x2="22.88" y2="14.23" />
      </svg>
    </div>
  </div>
</template>

<script>
  import {Http} from '@/helpers/http-helper'
  import dropdownNav from '@/helpers/nav-dropdown.js'

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
      dropdownNav.dropdown_nav()
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
