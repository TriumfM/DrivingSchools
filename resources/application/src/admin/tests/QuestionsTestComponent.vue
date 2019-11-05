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
          <div class="table__th">Question {{question.order_number}}: </div>
          <div class='table__td table_td--click'>{{question.name}}</div>
        </div>
        <div class="table__td--action">
          <div class="dropdown">
            <div class="icon__dropdown"  id="dropdownRowBuilding" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <i class="fa fa-ellipsis-v" ></i>
            </div>
            <ul class="dropdown-menu dropdown-menu-main dropdown-menu-right" aria-labelledby="dropdownRowBuilding">
              <li class="dropdown__item" @click="showAnswers = true, fetchByQuestionAnswers(question.id)">
                <div class="dropdown__item--icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                <span class="dropdown__item--description">Answers</span>
              </li>
              <li class="dropdown__item" @click="fetchByQuestionAnswers(question.id), showActions(index)">
                <div class="dropdown__item--icon"><i class="fa fa-info" aria-hidden="true"></i></div>
                <span class="dropdown__item--description">Answers</span>
              </li>
              <li class="dropdown__item" data-toggle="modal" @click="fetchByIdQuestion(question.id), modalEdit()">
                <div class="dropdown__item--icon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                <span class="dropdown__item--description">Edit</span>
              </li>
              <li class="dropdown__item" @click="destroyQuestion(question.id)">
                <div class="dropdown__item--icon"><i class="fa fa-trash" aria-hidden="true"></i></div>
                <span class="dropdown__item--description">Delete</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="table__answers col-md-12" v-for="(answer, indexA) in answers" v-if="rowIndex == index">
          <div class="table__answers--content">
            <label>Answer {{indexA + 1}}: </label>
            <span>{{answer.name}}</span>
          </div>
          <div class="table__answers--status"><i class="fa fa-circle" :class="[answer.solution == true ? 'true__color': 'false__color']"></i> </div>
          <div class="table__answers--actions"></div>
        </div>
      </div>
    </div>
    <modal-component :show="show" position="center" type="form">
      <div class="modal__header modal--form_header border--bottom">
        <h3>Question</h3>
        <span v-on:click="showModal()"></span>
      </div>
      <div class="modal__content modal--form_content">
        <div class="cnf__input col-md-12">
          <label>Question</label>
          <textarea class="basic__input textarea--input medium--input" type="text" v-model="question.name"></textarea>
          <span class="error__span" v-if="errors.name">{{ errors.name[0] }}</span>
        </div>
        <div class="cnf__input col-md-6">
          <label>Points</label>
          <input class="basic__input" type="number" v-model="question.points" min=1>
          <span class="error__span" v-if="errors.points">{{ errors.points[0] }}</span>
        </div>
        <div class="cnf__input col-md-6">
          <label>No. ordinal</label>
          <input class="basic__input" type="number" v-model="question.order_number" min=1>
          <span class="error__span" v-if="errors.order_number">{{ errors.order_number[0] }}</span>
        </div>
        <div class="custom-file cnf__input col-md-12">
          <label>Photo</label>
          <multiple-image-uploader :photo_url="question.photo_url" @getURL="permitImage" ></multiple-image-uploader>
          <span class="error__span" v-if="errors.photo_url">{{ errors.photo_url[0]}}</span>
        </div>
      </div>
      <div class="modal__footer modal--form_footer border--top">
        <button class="button__style btn--footer_modal" @click="saveQuestion(question)">Save question</button>
      </div>
    </modal-component>
    <modal-component :show="showAnswers" position="center" type="form">
      <div class="modal__header modal--form_header border--bottom">
        <h3>Answers</h3>
        <span v-on:click="showAnswers = false"></span>
      </div>
      <div class="modal__content modal--form_content">
        <div v-for="(answer, index) in answers" class="answers__inputs">
          <div class="cnf__input col-md-10">
            <label>Answer {{index + 1}}</label>
            <input type="text" class="basic__input" v-model="answer.name">
            <!--<span class="error__span" v-if="errorsAnswers[index].name">{{ errorsAnswers[index].name[index] }}</span>-->
          </div>

          <div class="cnf__input col-md-2">
            <label>Status {{index + 1}}</label>
            <input type="checkbox" v-model="answer.solution">
            <!--<span class="error__span" v-if="errorsAnswers[index].solution">{{ errorsAnswers[index].solution[index] }}</span>-->
          </div>
        </div>
      </div>
      <div class="modal__footer modal--form_footer border--top">
        <button class="button__style btn--footer_modal" @click="saveAnswers(question)">Save</button>
      </div>
    </modal-component>
  </div>
</template>

<script>
  import {Http} from '@/helpers/http-helper'
  import ModalComponent from '@/helpers/ModalComponent.vue'
  import PhotoFile from '@/helpers/PhotoFile'
  import alert from '@/services/sweetAlert.js'
  import MultipleImageUploader from '@/helpers/MultipleImageUploader'
  import objectToFormData from '@/helpers/object-to-formdata'

  export default {
    components: {
      ModalComponent,
      PhotoFile,
      MultipleImageUploader
    },

    data () {
      return {
        show: false,
        showAnswers: false,
        questions: {},
        question: {},
        answers: [
          {id: null, name: null, solution: false, question_id: this.$route.params.testId},
          {id: null, name: null, solution: false, question_id: this.$route.params.testId},
          {id: null, name: null, solution: false, question_id: this.$route.params.testId}
        ],
        errors: {},
        errorsAnswers: [
          {name: null, solution: null},
          {name: null, solution: null},
          {name: null, solution: null}
        ],
        details: {},
        results: {},
        tests: {},
        test: {},
        rowIndex: -1,
        modal: '',
      }
    },
    mounted () {
      this.fetchAllQuestions()
    },
    methods: {

      deleteImage: function () {
        this.fetchDatas()
      },
      permitImage: function (param) {
        this.question['photo'] = param[0]
      },

      showActions: function (indexRow) {
        if (this.rowIndex == indexRow) {
          this.rowIndex = -1
        } else {
          this.rowIndex = indexRow
        }
      },

      showModal: function () {
        this.show = !this.show
      },
      fetchAllQuestions: function () {
        Http.get(`/trainings/questions/tests/`+ this.$route.params.testId)
          .then(response => {
            this.questions = response.data
          })
      },
      fetchByIdQuestion: function (idQuestion) {
        Http.get(`/trainings/questions/` + idQuestion)
          .then(response => {
            this.question = response.data
          })
          .catch(e => {
          })
      },
      saveQuestion: function (data) {
        let vm = this
        data.test_id = this.$route.params.testId
        vm.errors = {}

        if (data.id != undefined) {
          Http.post(`/trainings/questions/` + data.id, objectToFormData(vm.question))
            .then(response => {
              vm.fetchAllQuestions()
              vm.errors = {}
              alert.CaseInfo('success', 'Success!', '', 1000)
            })
            .catch(e => {
              vm.errors = e.response.data.errors
            })
        } else {
          Http.post(`/trainings/questions`,objectToFormData(vm.question))
            .then(response => {
              vm.fetchAllQuestions()
              vm.errors = {}
              vm.question = {}
              vm.show = false
              alert.CaseInfo('success', 'Success!', '', 1000)
            })
            .catch(e => {
              vm.errors = e.response.data.errors
            })
        }
      },
      destroyQuestion: function (idQuestion) {
        let vm = this

        alert.deletePopUp(function () {
          Http.delete(`/trainings/questions/` + idQuestion)
            .then(response => {
              vm.fetchAllQuestions()
              alert.CaseInfo('success', 'Success!', '', 1000)
            })
            .catch(e => {
              alert.CaseInfo('error', 'Error!', '', 1500)
            })
        }, '')
      },
      fetchByQuestionAnswers: function (idQuestion) {
        this.fetchByIdQuestion(idQuestion)
        Http.get(`/trainings/answers/questions/` + idQuestion)
          .then(response => {
            this.answers = response.data
          })
          .catch(e => {
            this.errorsAnswers = e.body
          })
      },
      saveAnswers: function (data) {
        let vm = this
        vm.errors = {}
        Http.put(`/trainings/answers/` + data.id, vm.answers)
          .then(response => {
            vm.errorsAnswers = {}
            alert.CaseInfo('success', 'Success!', '', 1000)
            vm.showAnswers = false
          })
          .catch(e => {
            vm.errorsAnswers = e.response.data.errors
          })
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
