<template>
  <div class="video__body">
    <h2 class="video__title">Lista e Videove</h2>
    <div class="videos">
      <div class="video__box" v-for="video in videos">
        <div class="video__photo">
          <img :src="'https://img.youtube.com/vi/'+ video.path +'/2.jpg'"/>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33.73 33.73">
            <circle class="cls-1" cx="16.86" cy="16.86" r="16.86" />
            <polygon points="22.92 16.86 14.73 21.59 14.73 12.14 22.92 16.86" />
          </svg>
        </div>
        <div class="video__info">
          <h5 class="video__label">{{video.title}}</h5>
          <p class="video__descriptions">{{video.description}}</p>
        </div>
        <div class="video__button">
          <button class="button__style button--show_video" @click="fetchById(video.id)">
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
        <h3>{{video.title}}</h3>
        <span v-on:click="showModal()"></span>
      </div>
      <div class="modal__content modal__video no--padding">
        <iframe :src="'https://www.youtube.com/embed/' + video.path" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </modal-component>
  </div>
</template>

<script>
  import ModalComponent from '@/helpers/ModalComponent.vue'
  import {Http} from '@/helpers/http-helper'

  export default {
    components: {ModalComponent},
    component: {
      ModalComponent
    },
    data () {
      return {
        showImg: 1,
        show: false,
        videos: {},
        video: {}
      }
    },
    mounted () {
      this.fetchAll()
    },
    methods: {
      showModal: function () {
        this.show = !this.show
      },
      fetchAll: function () {
        Http.get(`videos`)
          .then(response => {
            this.videos = response.data
          })
      },
      fetchById: function (idVideo) {
        this.showModal()

        Http.get(`/videos/` + idVideo)
          .then(response => {
            this.video = response.data
          })
          .catch(e => {
            this.errors = e.body
          })
      },
    }
  }
</script>
