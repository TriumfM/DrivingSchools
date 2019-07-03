<template>
  <div class="col-md-12 admin__content">
    <div class="admin__header">
      <h2 class="title_side">All Messages</h2>
    </div>
    <div class="table_2td">
      <div class="table__row" v-for="message in messages">
        <div class='table__th--data'>
          <div class="table__th">Name: </div>
          <div class='table__td table_td--click'>{{message.name}}</div>
        </div>
        <div class='table__th--data'>
          <div class="table__th">Email: </div>
          <div class='table__td table_td--click'>{{message.email}}</div>
        </div>
        <div class="table__td--action">
          <div class="dropdown">
            <div class="icon__dropdown"  id="dropdownRowBuilding" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <i class="fa fa-ellipsis-v" ></i>
            </div>
            <ul class="dropdown-menu dropdown-menu-main dropdown-menu-right" aria-labelledby="dropdownRowBuilding">
              <li class="dropdown__item" data-toggle="modal" @click="fetchById(literature.id), modalEdit()">
                <div class="dropdown__item--icon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                <span class="dropdown__item--description">Edit</span>
              </li>
              <li class="dropdown__item" v-on:click="destroy()" @click="destroy(message.id)">
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
        <div class="cnf__input col-md-6">
          <label>Name</label>
          <span type="text" class="basic__input">{{message.name}}</span>
        </div>
        <div class="cnf__input col-md-6">
          <label>Email</label>
          <span >{{message.email}}</span>
        </div>
        <div class="cnf__input col-md-12">
          <label>Description</label>
          <textarea class="basic__input textarea--input medium--input" v-model="message.message_text" ></textarea>
        </div>
      </div>
    </modal-component>
  </div>
</template>

<script>
  import {Http} from '@/helpers/http-helper'
  import ModalComponent from '@/helpers/ModalComponent.vue'
  import alert from '@/services/sweetAlert.js'
  import MultipleImageUploader from '@/helpers/MultipleImageUploader'
  import Treeselect from '@riophae/vue-treeselect'

  export default {
    components: {
      ModalComponent,
      MultipleImageUploader,
      Treeselect
    },
    data () {
      return {
        showImg: 1,
        show: false,
        messages: {},
        message: {},
        errors: {},
        modal: '',
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
        Http.get(`/messages`)
          .then(response => {
            this.messages = response.data
          })
      },
      fetchById: function (idMessage) {
        Http.get(`/messages/` + idMessage)
          .then(response => {
            this.message = response.data
          })
          .catch(e => {
            this.errors = e.body
          })
      },
      destroy: function (idMessage) {
        let vm = this

        alert.deletePopUp(function () {
          Http.delete(`/message/` + idMessage)
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
        this.message = {}
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
