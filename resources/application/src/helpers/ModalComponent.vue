<template>
  <div class="modal__container" v-if="show" v-bind:class="{'reveal--modal': show, 'center--modal': position == 'center'}">
    <div class="modal__body" v-bind:class="" @click.stop>
      <slot></slot>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['show', 'position'],
    methods: {
      close: function () {

      }
    }
  }
</script>
