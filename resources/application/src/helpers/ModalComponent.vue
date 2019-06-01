<template>
  <div class="modal__container" v-if="show" v-bind:class="{'reveal--modal': show, 'center--modal': position == 'center'}">
    <div :class="{'modal__body': true, 'modal--form': (type == 'form')}" @click.stop>
      <slot></slot>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['show', 'position', 'type'],
    methods: {
      close: function () {
        this.$emit('close')
      }
    }
  }
</script>
