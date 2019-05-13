<template>
  <div class="main__container">
    <header-navigation></header-navigation>
    <router-view class="main__body"></router-view>
  </div>
</template>

<script>
  import HeaderNavigation from '@/partials/HeaderNavigation'

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
    },
    methods: {
    }
  }
</script>
