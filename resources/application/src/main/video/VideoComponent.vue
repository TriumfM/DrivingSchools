<template>
  <div class="video__body">
    <h2 class="video__title">Lista e Videove</h2>
    <div class="videos">
      <div class="video__box" v-for="n in 10">
        <div class="video__photo">
          <img src="https://img.youtube.com/vi/JjhKBzOC7Io/2.jpg"/>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33.73 33.73">
            <circle class="cls-1" cx="16.86" cy="16.86" r="16.86" />
            <polygon points="22.92 16.86 14.73 21.59 14.73 12.14 22.92 16.86" />
          </svg>
        </div>
        <div class="video__info">
          <h3 class="video__label">Emri i Videos</h3>
          <p class="video__descriptions">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
        </div>
        <div class="video__button">
          <button class="button__style button--show_video" @click="showModal()">
            <span>Shiko Videon</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.54 13.26">
              <line class="cls-1" x1="1.5" y1="6.63" x2="15.68" y2="6.63" />
              <polyline class="cls-1" points="10.91 1.5 16.04 6.63 10.91 11.76" />
            </svg>
          </button>
        </div>
      </div>
    </div>
    <modal-component :show="show" position="center">
      <div class="modal__header">
        <h3>Video 01</h3>
        <span v-on:click="showModal()"></span>
      </div>
      <div class="modal__content modal__video no--padding">
        <iframe src="https://www.youtube.com/embed/JjhKBzOC7Io" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </modal-component>
  </div>
</template>

<script>
  import ModalComponent from '@/helpers/ModalComponent.vue'

  export default {
    components: {ModalComponent},
    component: {
      ModalComponent
    },
    data () {
      return {
        showImg: 1,
        show: false
      }
    },
    methods: {
      showModal: function () {
        this.show = !this.show
      }
    }
  }
</script>
