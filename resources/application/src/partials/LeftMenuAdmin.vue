<template>
  <div v-bind:class="{'menu':true, 'sidebar':true,}">
    <div class="logo">
      <div class="first__letters">
        <p>{{user.full_name | firstLetter}}</p>
      </div>
      <p class="user__name">{{user.full_name}}</p>
    </div>
    <div class="user__actions">
      <a @click="logout()"><i class="fa fa-power-off" aria-hidden="true"></i></a>
    </div>
    <div class='list'>
      <router-link :to="{ name: 'admin-users'}" :class="{'list__tile--link' : true, 'list__tile--link-active' : ($route.name == 'admin-users')}">
        <span class="active__span"></span>
        <div :class="{'list__tile__icon':true, 'active__icon': true}">
          <i class="fa fa-users"></i>
        </div>
        <div :class="{'list__tile__title':true}">
          <span>Users</span>
        </div>
      </router-link>
      <router-link :to="{ name: 'admin-tests'}" :class="{'list__tile--link' : true, 'list__tile--link-active' : ($route.name == 'admin-tests')}">
        <span class="active__span"></span>
        <div :class="{'list__tile__icon':true, 'active__icon': true}">
          <i class="fa fa-folder"></i>
        </div>
        <div :class="{'list__tile__title':true}">
          <span>Tests</span>
        </div>
      </router-link>
      <router-link :to="{ name: 'admin-videos'}" :class="{'list__tile--link' : true, 'list__tile--link-active' : ($route.name == 'admin-videos')}">
        <span class="active__span"></span>
        <div :class="{'list__tile__icon':true, 'active__icon': true}">
          <i class="fa fa-video-camera"></i>
        </div>
        <div :class="{'list__tile__title':true}">
          <span>Videos</span>
        </div>
      </router-link>
      <router-link :to="{ name: 'admin-literature'}" :class="{'list__tile--link' : true, 'list__tile--link-active' : ($route.name == 'admin-literature')}">
        <span class="active__span"></span>
        <div :class="{'list__tile__icon':true, 'active__icon': true}">
          <i class="fa fa-book"></i>
        </div>
        <div :class="{'list__tile__title':true}">
          <span>Literature</span>
        </div>
      </router-link>
      <!--<router-link :to="{ name: 'admin-messages'}" :class="{'list__tile&#45;&#45;link' : true, 'list__tile&#45;&#45;link-active' : ($route.name == 'admin-messages')}">-->
        <!--<span class="active__span"></span>-->
        <!--<div :class="{'list__tile__icon':true, 'active__icon': true}">-->
          <!--<i class="fa fa-comments"></i>-->
        <!--</div>-->
        <!--<div :class="{'list__tile__title':true}">-->
          <!--<span>Messages</span>-->
        <!--</div>-->
      <!--</router-link>-->
    </div>
  </div>
</template>

<script>

  import {Http} from '@/helpers/http-helper'

  export default {
    props: [],
    data () {
      return {
        user: {},
      }
    },
    filters: {
      capitalize: function (value) {
        if (!value) return ''
        value = value.toString()
        return value.charAt(0).toUpperCase() + value.slice(1)
      },
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
