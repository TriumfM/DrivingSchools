<template>
  <div class="col-md-12 admin__content">
    <div class="admin__header">
      <h2 class="title_side">Questions of Test 1</h2>
      <div class="add_new-button">
        <button class="btn btn-primary" @click="showModal()">Add new</button>
      </div>
    </div>
    <div class="table__main table_classic">
      <div class="table__row" v-for="(question, index) in questions">
        <div class='table__th--data'>
          <div class="table__th">Question {{index + 1}}: </div>
          <div class='table__td table_td--click'>{{question.name}}</div>
        </div>
        <div class="table__td--action">
          <div class="dropdown">
            <div class="icon__dropdown"  id="dropdownRowBuilding" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <i class="fa fa-ellipsis-v" ></i>
            </div>
            <ul class="dropdown-menu dropdown-menu-main dropdown-menu-right" aria-labelledby="dropdownRowBuilding">
              <li class="dropdown__item" @click="showAnswers = true">
                <div class="dropdown__item--icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                <span class="dropdown__item--description">Answers</span>
              </li>
              <li class="dropdown__item" @click="showActions(index)">
                <div class="dropdown__item--icon"><i class="fa fa-info" aria-hidden="true"></i></div>
                <span class="dropdown__item--description">Answers</span>
              </li>
              <li class="dropdown__item" data-toggle="modal" @click="(brand.id), modalEdit()">
                <div class="dropdown__item--icon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                <span class="dropdown__item--description">Edit</span>
              </li>
              <li class="dropdown__item" @click="destroy()">
                <div class="dropdown__item--icon"><i class="fa fa-trash" aria-hidden="true"></i></div>
                <span class="dropdown__item--description">Delete</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="table__answers col-md-12" v-for="n in 3" v-if="rowIndex == index">
          <div class="table__answers--content">
            <label>Answer {{n}}: </label>
            <span>Po!</span>
          </div>
          <div class="table__answers--status"><i class="fa fa-circle true__color"></i> </div>
          <div class="table__answers--actions"></div>
        </div>
      </div>
    </div>
    <modal-component :show="show" position="center" type="form">
      <div class="modal__header modal--form_header border--bottom">
        <h3>Add Question</h3>
        <span v-on:click="showModal()"></span>
      </div>
      <div class="modal__content modal--form_content">
        <div class="cnf__input col-md-12">
          <label>Question</label>
          <textarea class="basic__input textarea--input medium--input" type="text" v-model="question.content" :class="[errors.content ? 'error': '']"></textarea>
          <span class="error__span" v-if="errors.content">{{ errors.content[0] }}</span>
        </div>
        <div class="cnf__input col-md-6">
          <label>Points</label>
          <input class="basic__input" type="number" v-model="question.points" :class="[errors.points ? 'error': '']"  min=1>
          <span class="error__span" v-if="errors.points">{{ errors.points[0] }}</span>
        </div>
        <div class="cnf__input col-md-6">
          <label>No. ordinal</label>
          <input class="basic__input" type="number" v-model="question.nr_ordinal" :class="[errors.nr_ordinal ? 'error': '']" min=1>
          <span class="error__span" v-if="errors.nr_ordinal">{{ errors.nr_ordinal[0] }}</span>
        </div>
        <div class="custom-file cnf__input col-md-12">
          <label>Photo</label>
          <div class="basic__input">
            <input type="file" class="custom-file-input" v-on:change="question.photo">
            <label class="custom-file-label file__label">Choose file</label>
          </div>
          <span class="error__span" v-if="errors.photo">{{ errors.photo[0]}}</span>
        </div>

        <!--<photo-file :gallery="details.images" v-on:drop-success="images" v-on:image-deleted="deleteImage" :identifier="details.id"></photo-file>-->
      </div>
      <div class="modal__footer modal--form_footer border--top">
        <button class="button__style btn--footer_modal">Save question</button>
      </div>
    </modal-component>
    <modal-component :show="showAnswers" position="center" type="form">
      <div class="modal__header modal--form_header border--bottom">
        <h3>Answers</h3>
        <span v-on:click="showAnswers = false"></span>
      </div>
      <div class="modal__content modal--form_content">
        <div v-for="(n, index) in 3" class="answers__inputs">
          <div class="cnf__input col-md-10">
            <label>Answer {{n}}</label>
            <input type="text" class="basic__input" v-model="answers[index].name">
            <span class="error__span" v-if="errorsAnswers[index].name">{{ errorsAnswers[index].name[index] }}</span>
          </div>

          <div class="cnf__input col-md-2">
            <label>Status</label>
            <input type="checkbox" v-model="answers[index].solution">
            <span class="error__span" v-if="errorsAnswers[index].solution">{{ errorsAnswers[index].solution[index] }}</span>
          </div>
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
  import PhotoFile from '@/helpers/PhotoFile'
  import alert from '@/services/sweetAlert.js'

  export default {
    components: {
      ModalComponent,
      PhotoFile
    },

    data () {
      return {
        show: false,
        showAnswers: false,
        questions: {},
        question: {},
        answers: [
          {id: null, name: null, solution: null, question_id: this.$route.params.testId},
          {id: null, name: null, solution: null, question_id: this.$route.params.testId},
          {id: null, name: null, solution: null, question_id: this.$route.params.testId}
        ],
        errors: {},
        errorsAnswers: [
          {name: null, solution: null},
          {name: null, solution: null},
          {name: null, solution: null}
        ],
        details: {},
        tests: {},
        test: {},
        rowIndex: -1,
        modal: '',
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

      showActions: function (indexRow) {
        if (this.rowIndex === indexRow) {
          this.rowIndex = -1
        } else {
          this.rowIndex = indexRow
        }
      },

      showModal: function () {
        this.show = !this.show
      },
      fetchAll: function () {
        Http.get(`/trainings/tests/`+ this.$route.params.testId)
          .then(response => {
            this.questions = response.data.questions
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
