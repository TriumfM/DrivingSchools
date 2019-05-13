<template>
  <div class="header">
    <img class='logo' src="@/assets/img/logo.png"/>
    <div class="menu__items">
      <router-link class="menu__item" :to="{name: 'test'}">Testohu</router-link>
      <router-link class="menu__item" :to="{name: 'video'}">Video</router-link>
      <router-link class="menu__item" :to="{name: 'literature'}">Literatura</router-link>
      <router-link class="menu__item" :to="{name: 'login'}">Log Out</router-link>
    </div>
  </div>
</template>

<script>

</script>
