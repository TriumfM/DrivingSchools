<template>
  <div class="col-md-12 admin__content">
    <div class="admin__header">
      <h2 class="title_side">All Users</h2>
      <div class="add_new-button">
        <button class="btn btn-primary" @click="modalAdd()">Add new</button>
      </div>
    </div>
    <div class="table_4td">
      <div class="table__row" v-for="user in users">
        <div class='table__th--data'>
          <div class="table__th">User: </div>
          <div class='table__td table_td--click'>{{user.full_name}}</div>
        </div>
        <div class='table__th--data'>
          <div class="table__th">Tel: </div>
          <div class='table__td table_td--click'>{{user.number}}</div>
        </div>
        <div class='table__th--data'>
          <div class="table__th">Role: </div>
          <div class='table__td table_td--click'>{{user.role}}</div>
        </div>
        <div class='table__th--data'>
        <div class="table__th">Expire: </div>
        <div class='table__td table_td--click'>{{user.expire}}</div>
      </div>
        <div class="table__td--action">
          <div class="dropdown">
            <div class="icon__dropdown"  id="dropdownRowBuilding" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <i class="fa fa-ellipsis-v" ></i>
            </div>
            <ul class="dropdown-menu dropdown-menu-main dropdown-menu-right" aria-labelledby="dropdownRowBuilding">
              <li class="dropdown__item" data-toggle="modal" @click="fetchById(user.id), modalEdit()">
                <div class="dropdown__item--icon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                <span class="dropdown__item--description">Edit</span>
              </li>
              <li class="dropdown__item" @click="destroy(user.id)">
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
          <label>Full name</label>
          <input type="text" class="basic__input" v-model="user.full_name">
          <span class="error__span" v-if="errors.full_name">{{ errors.full_name[0] }}</span>
        </div>
        <div class="cnf__input col-md-6">
          <label>Email</label>
          <input type="email" class="basic__input" v-model="user.email">
          <span class="error__span" v-if="errors.email">{{ errors.email[0] }}</span>
        </div>
        <div class="cnf__input col-md-6">
          <label>Tel. number</label>
          <input type="text" class="basic__input" v-model="user.number">
          <span class="error__span" v-if="errors.number">{{ errors.number[0] }}</span>
        </div>
        <div class="cnf__input col-md-6">
          <label>Role</label>
          <treeselect :options="roles" placeholder="Choose role" :normalizer="normalizerName" v-model="user.role">
            <label slot="option-label" slot-scope="{ node }">
              {{ node.raw.name }}
            </label>
          </treeselect>
          <span class="error__span" v-if="errors.role">{{ errors.role[0] }}</span>
        </div>
        <div class="cnf__input col-md-6">
          <label>Password</label>
          <input type="password" class="basic__input" v-model="user.password">
          <span class="error__span" v-if="errors.password">{{ errors.password[0] }}</span>
        </div>
        <div class="cnf__input col-md-6">
          <label>Retype Password</label>
          <input type="password" class="basic__input" v-model="user.retype_password">
          <span class="error__span" v-if="errors.retype_password">{{ errors.retype_password[0] }}</span>
        </div>
        <div class="cnf__input col-md-6">
          <label>Expire date</label>
          <input type="date" class="basic__input data--input" v-model="user.expire">
          <span class="error__span" v-if="errors.expire">{{ errors.expire[0] }}</span>
        </div>
      </div>
      <div class="modal__footer modal--form_footer border--top">
        <button class="button__style btn--footer_modal" @click="save(user)">Save</button>
      </div>
    </modal-component>
  </div>
</template>

<script>
  import {Http} from '@/helpers/http-helper'
  import ModalComponent from '@/helpers/ModalComponent.vue'
  import alert from '@/services/sweetAlert.js'
  import Treeselect from '@riophae/vue-treeselect'

  export default {
    components: {
      ModalComponent,
      Treeselect
    },
    data () {
      return {
        showImg: 1,
        show: false,
        users: {},
        user: {},
        errors: {},
        roles: [
          {id:'admin', name:'Admin'},
          {id:'student', name:'Student'}
        ],
        modal: '',
        normalizerName  (node) {
          return {
            id: node.id,
            label: node.name
          }
        },
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
        Http.get(`users`)
          .then(response => {
            this.users = response.data
          })
      },
      fetchById: function (idUser) {
        Http.get(`/users/` + idUser)
          .then(response => {
            this.user = response.data
          })
          .catch(e => {
            this.errors = e.body
          })
      },
      save: function (data) {
        let vm = this
        vm.errors = {}
        if (data.id !== undefined) {
          Http.put('/users/' + data.id, vm.user)
            .then(response => {
              vm.fetchAll()
              vm.errors = {}
              alert.CaseInfo('success', 'Success!', '', 1000)
            })
            .catch(e => {
              vm.errors = e.response.data.errors
            })
        } else {
          Http.post(`/users`, vm.user)
            .then(response => {
              vm.fetchAll()
              vm.errors = {}
              vm.user = {}
              vm.show = false
              alert.CaseInfo('success', 'Success!', '', 1000)
            })
            .catch(e => {
              vm.errors = e.response.data.errors
            })
        }
      },
      destroy: function (idUser) {
        let vm = this

        alert.deletePopUp(function () {
          Http.delete(`/users/` + idUser)
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
        this.user = {}
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
