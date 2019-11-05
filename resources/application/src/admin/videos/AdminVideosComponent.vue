<template>
  <div class="col-md-12 admin__content">
    <div class="admin__header">
      <h2 class="title_side">All Videos</h2>
      <div class="add_new-button">
        <button class="btn btn-primary" @click="modalAdd()">Add new</button>
      </div>
    </div>
    <div class="table__main table_classic">
      <div class="table__row" v-for="video in videos">
        <div class='table__th--data'>
          <div class="table__th">Title: </div>
          <div class='table__td table_td--click'>{{video.title}}</div>
        </div>
        <div class="table__td--action">
          <div class="dropdown">
            <div class="icon__dropdown"  id="dropdownRowBuilding" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <i class="fa fa-ellipsis-v" ></i>
            </div>
            <ul class="dropdown-menu dropdown-menu-main dropdown-menu-right" aria-labelledby="dropdownRowBuilding">
              <li class="dropdown__item" data-toggle="modal" @click="fetchById(video.id), modalEdit()">
                <div class="dropdown__item--icon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                <span class="dropdown__item--description">Edit</span>
              </li>
              <li class="dropdown__item" v-on:click="destroy()" @click="destroy(video.id)">
                <div class="dropdown__item--icon"><i class="fa fa-trash" aria-hidden="true"></i></div>
                <span class="dropdown__item--description">Delete</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <modal-component :show="show" position="center" type="form">
      <div class="modal__header modal--form_header border--bottom">
        <h3>{{modal}}</h3>
        <span v-on:click="showModal()"></span>
      </div>
      <div class="modal__content modal--form_content">
        <div class="cnf__input col-md-7">
          <label>Title</label>
          <input type="text" class="basic__input" v-model="video.title">
          <span class="error__span" v-if="errors.title">{{ errors.title[0] }}</span>
        </div>
        <div class="cnf__input col-md-5">
          <label>Path</label>
          <input type="email" class="basic__input" v-model="video.path">
          <span class="error__span" v-if="errors.path">{{ errors.path[0] }}</span>
        </div>
        <div class="cnf__input col-md-12">
          <label>Description</label>
          <textarea class="basic__input textarea--input medium--input" v-model="video.description" ></textarea>
          <span class="error__span" v-if="errors.description">{{ errors.description[0] }}</span>
        </div>
      </div>
      <div class="modal__footer modal--form_footer border--top">
        <button class="button__style btn--footer_modal" @click="save(video)">Save</button>
      </div>
    </modal-component>
  </div>
</template>

<script>
  import {Http} from '@/helpers/http-helper'
  import ModalComponent from '@/helpers/ModalComponent.vue'
  import alert from '@/services/sweetAlert.js'

  export default {
    components: {
      ModalComponent
    },
    data () {
      return {
        showImg: 1,
        show: false,
        videos: {},
        video: {},
        errors: {},
        modal: ''
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
        Http.get(`/videos/` + idVideo)
          .then(response => {
            this.video = response.data
          })
          .catch(e => {
            this.errors = e.body
          })
      },
      save: function (data) {
        let vm = this
        vm.errors = {}
        if (data.id != undefined) {
          Http.put('/videos/' + data.id, vm.video)
            .then(response => {
              vm.fetchAll()
              vm.errors = {}
              alert.CaseInfo('success', 'Success!', '', 1000)
            })
            .catch(e => {
              vm.errors = e.response.data.errors
            })
        } else {
          Http.post(`/videos`, vm.video)
            .then(response => {
              vm.fetchAll()
              vm.errors = {}
              vm.video = {}
              vm.show = false
              alert.CaseInfo('success', 'Success!', '', 1000)
            })
            .catch(e => {
              vm.errors = e.response.data.errors
            })
        }
      },
      destroy: function (idVideo) {
        let vm = this

        alert.deletePopUp(function () {
          Http.delete(`/videos/` + idVideo)
            .then(response => {
              vm.fetchAll()
              alert.CaseInfo('success', 'Success!', '', 1000)
            })
            .catch(e => {
              alert.CaseInfo('error', 'Error!', '', 1500)
            })
        }, '')
      },
      modalAdd: function () {
        this.modal = 'Add new'
        this.video = {}
        this.errors = {}
        this.show = true
      },
      modalEdit: function () {
        this.modal = 'Edit'
        this.show = true
        this.errors = {}
      },

    }
  }
</script>
