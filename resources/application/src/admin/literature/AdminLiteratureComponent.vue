<template>
  <div class="col-md-12 admin__content">
    <div class="admin__header">
      <h2 class="title_side">All Literatures</h2>
      <div class="add_new-button">
        <button class="btn btn-primary" @click="modalAdd()">Add new</button>
      </div>
    </div>
    <div class="table_2td">
      <div class="table__row" v-for="literature in 10">
        <div class='table__th--data'>
          <div class="table__th">Title: </div>
          <div class='table__td table_td--click'>literature.title</div>
        </div>
        <div class='table__th--data'>
          <div class="table__th">Type: </div>
          <div class='table__td table_td--click'>literature.type.name</div>
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
              <li class="dropdown__item" v-on:click="destroy()" @click="destroy(literature.id)">
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
          <label>Title</label>
          <input type="text" class="basic__input" v-model="literature.title">
          <span class="error__span" v-if="errors.title">{{ errors.title[0] }}</span>
        </div>
        <div class="cnf__input col-md-6">
          <label>Type</label>
          <treeselect :options="types" placeholder="Choose type" :normalizer="normalizerName" v-model="literature.type_id">
            <label slot="option-label" slot-scope="{ node }">
              {{ node.raw.name }}
            </label>
          </treeselect>
          <span class="error__span" v-if="errors.type_id">{{ errors.type_id[0] }}</span>
        </div>
        <div class="cnf__input col-md-12">
          <label>Description</label>
          <textarea class="basic__input textarea--input medium--input" v-model="literature.description" ></textarea>
          <span class="error__span" v-if="errors.description">{{ errors.description[0] }}</span>
        </div>
        <div class="custom-file cnf__input col-md-12">
          <label>Photo</label>
          <multiple-image-uploader v-model="question.photo" :gallery="literature.images" v-on:drop-success="images" v-on:image-deleted="deleteImage" :identifier="literature.id"></multiple-image-uploader>
          <span class="error__span" v-if="errors.photo_url">{{ errors.photo_url[0]}}</span>
        </div>
      </div>
      <div class="modal__footer modal--form_footer border--top">
        <button class="button__style btn--footer_modal" @click="save(literature)">Save</button>
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
        types: [],
        literatures: {},
        literature: {},
        details: {},
        errors: {},
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
      images: function (param) {
        this.details['image'] = param
      },
      deleteImage: function () {
        this.fetchDatas()
      },

      showModal: function () {
        this.show = !this.show
      },
      fetchAll: function () {
        Http.get(`literatures`)
          .then(response => {
            this.literatures = response.data
          })
      },
      fetchById: function (idliterature) {
        Http.get(`/literatures/` + idliterature)
          .then(response => {
            this.literature = response.data
          })
          .catch(e => {
            this.errors = e.body
          })
      },
      save: function (data) {
        let vm = this
        vm.errors = {}
        if (data.id !== undefined) {
          Http.put('/literatures/' + data.id, vm.literature)
            .then(response => {
              vm.fetchAll()
              vm.errors = {}
              alert.CaseInfo('success', 'Success!', '', 1000)
            })
            .catch(e => {
              vm.errors = e.response.data.errors
            })
        } else {
          Http.post(`/literatures`, vm.literature)
            .then(response => {
              vm.fetchAll()
              vm.errors = {}
              vm.literature = {}
              vm.show = false
              alert.CaseInfo('success', 'Success!', '', 1000)
            })
            .catch(e => {
              vm.errors = e.response.data.errors
            })
        }
      },
      destroy: function (idliterature) {
        let vm = this

        alert.deletePopUp(function () {
          Http.delete(`/literatures/` + idliterature)
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
        this.literature = {}
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
