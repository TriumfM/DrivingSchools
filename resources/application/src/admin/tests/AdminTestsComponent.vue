<template>
  <div class="col-md-12 admin__content">
    <div class="admin__header">
      <h2 class="title_side">All Tests</h2>
      <div class="add_new-button">
        <button class="btn btn-primary" @click="modalAdd()">Add new</button>
      </div>
    </div>
    <div class="table__main table_buttons">
      <div class="table__row" v-for="test in tests">
        <div class='table__th--data'>
          <div class="table__th">Name: </div>
          <div class='table__td table_td--click'>{{test.name}}</div>
        </div>
        <div class="table__button">
          <router-link class="btn btn__row" :to="{name: 'admin-questions', params: { testId: test.id }}">Questions</router-link>
        </div>
        <div class="table__td--action">
          <div class="dropdown">
            <div class="icon__dropdown"  id="dropdownRowBuilding" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <i class="fa fa-ellipsis-v" ></i>
            </div>
            <ul class="dropdown-menu dropdown-menu-main dropdown-menu-right" aria-labelledby="dropdownRowBuilding">
              <li class="dropdown__item" data-toggle="modal" @click="fetchById(test.id), modalEdit()">
                <div class="dropdown__item--icon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                <span class="dropdown__item--description">Edit</span>
              </li>
              <li class="dropdown__item" @click="destroy(test.id)">
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
        <div class="cnf__input col-md-12">
          <label>Test name</label>
          <input type="text" class="basic__input" v-model="test.name">
          <span class="error__span" v-if="errors.name">{{ errors.name[0] }}</span>
        </div>
      </div>
      <div class="modal__footer modal--form_footer border--top">
        <button class="button__style btn--footer_modal" @click="save(test)">Save</button>
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
      ModalComponent,
    },
    data () {
      return {
        show: false,
        tests: {},
        test: {},
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
        Http.get(`/trainings/tests`)
          .then(response => {
            this.tests = response.data
          })
      },
      fetchById: function (idTest) {
        Http.get(`/trainings/tests/` + idTest)
          .then(response => {
            this.test = response.data
          })
          .catch(e => {
            this.errors = e.body
          })
      },
      save: function (data) {
        let vm = this
        vm.errors = {}
        if (data.id !== undefined) {
          Http.put(`/trainings/tests/` + data.id, vm.test)
            .then(response => {
              vm.fetchAll()
              vm.errors = {}
              alert.CaseInfo('success', 'Success!', '', 1000)
            })
            .catch(e => {
              vm.errors = e.response.data.errors
            })
        } else {
          Http.post(`/trainings/tests/`, vm.test)
            .then(response => {
              vm.fetchAll()
              vm.errors = {}
              vm.test = {}
              vm.show = false
              alert.CaseInfo('success', 'Success!', '', 1000)
            })
            .catch(e => {
              vm.errors = e.response.data.errors
            })
        }
      },
      destroy: function (idTest) {
        let vm = this

        alert.deletePopUp(function () {
          Http.delete(`/trainings/tests/` + idTest)
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
        this.test = {}
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
