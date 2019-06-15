<template>
  <div class="col-md-12 admin__content">
    <div class="admin__header">
      <h2 class="title_side">Questions of Test 1</h2>
      <div class="add_new-button">
        <button class="btn btn-primary" @click="showModal()">Add new</button>
      </div>
    </div>
    <div class="table__main table_classic">
      <div class="table__row" v-for="brand in 10">
        <div class='table__th--data'>
          <div class="table__th">Name: </div>
          <div class='table__td table_td--click'>Pyetja {{brand}}</div>
        </div>
        <div class="table__td--action">
          <div class="dropdown">
            <div class="icon__dropdown"  id="dropdownRowBuilding" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <i class="fa fa-ellipsis-v" ></i>
            </div>
            <ul class="dropdown-menu dropdown-menu-main dropdown-menu-right" aria-labelledby="dropdownRowBuilding">
              <li class="dropdown__item" data-toggle="modal" @click="getDetails(brand.id), modalEdit()">
                <div class="dropdown__item--icon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                <span class="dropdown__item--description">Edit</span>
              </li>
              <li class="dropdown__item" v-on:click="destroy()" @click="destroy(brand.id)">
                <div class="dropdown__item--icon"><i class="fa fa-trash" aria-hidden="true"></i></div>
                <span class="dropdown__item--description">Delete</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="table__answers" v-for="n in 3">
          <div class="table__answers--content">Po!</div>
          <div class="table__answers--status"><i class="fa fa-circle-o"></i> </div>
          <div class="table__answers--actions"></div>
        </div>
      </div>
    </div>
    <modal-component :show="show" position="center">
      <div class="modal__header border-bottom">
        <h3>Add Question</h3>
        <span v-on:click="showModal()"></span>
      </div>
      <div class="modal__content">
        <div class="cnf__input col-md-12">
          <label>Question</label>
          <textarea class="basic__input textarea--input medium--input" type="text" v-model="question.content" :class="[errors.content ? 'error': '']"></textarea>
          <span class="error__span" v-if="errors.content">{{ errors.content[0] }}</span>
        </div>
        <div class="cnf__input col-md-1">
          <label>No. ordinal</label>
          <input class="basic__input" type="text" v-model="question.nr_ordinal" :class="[errors.nr_ordinal ? 'error': '']">
          <span class="error__span" v-if="errors.nr_ordinal">{{ errors.nr_ordinal[0] }}</span>
        </div>
        <div class="custom-file cnf__input col-md-11">
          <label>Photo</label>
          <div class="basic__input">
            <input type="file" class="custom-file-input" v-on:change="question.photo">
            <label class="custom-file-label">Choose file</label>
          </div>
          <span class="error__span" v-if="errors.photo">{{ errors.photo[0]}}</span>
        </div>
        <photo-file :gallery="details.images" v-on:drop-success="images" v-on:image-deleted="deleteImage" :identifier="details.id"></photo-file>
      </div>
      <div class="modal__footer border--top">
        <button class="button__style btn--footer_modal">Save question</button>
      </div>
    </modal-component>
  </div>
</template>

<script>
  import ModalComponent from '@/helpers/ModalComponent.vue'
  import PhotoFile from '@/helpers/PhotoFile'

  export default {
    components: {
      ModalComponent,
      PhotoFile
    },

    data () {
      return {
        show: false,
        question: {},
        errors: {},
        details: {}
      }
    },
    methods: {
      showModal: function () {
        this.show = !this.show
      },
      images: function (param) {
        this.details['image'] = param
      },
      deleteImage: function () {
        this.fetchDatas()
      },
    }
  }
</script>
