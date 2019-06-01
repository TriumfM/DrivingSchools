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
          <textarea class="basic__input textarea--input medium--input" type="text" v-model="service.quantity" :class="[errors.quantity ? 'error': '']"></textarea>
          <span class="error__span" v-if="errors.quantity">{{ errors.quantity[0] }}</span>
        </div>
        <div class="cnf__input col-md-1">
          <label>No. ordinal</label>
          <input class="basic__input" type="text" v-model="service.price" :class="[errors.price ? 'error': '']">
          <span class="error__span" v-if="errors.price">{{ errors.price[0] }}</span>
        </div>
        <div class="cnf__input col-md-11">
          <label>Photo</label>
          <input class="basic__input" type="text" v-model="service.price" :class="[errors.price ? 'error': '']">
          <span class="error__span" v-if="errors.price">{{ errors.price[0] }}</span>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
        <!--<div class="answers col-md-12">-->
          <!--<label class="sub-title">Answers</label>-->
          <!--<div class="answers__list col-md-3">-->
            <!--<ul>-->
              <!--<li>Po</li>-->
              <!--<li>Jo</li>-->
              <!--<li>Ndoshta</li>-->
            <!--</ul>-->
          <!--</div>-->
          <!--<div class="answers__new col-md-9">-->

            <!--<div class="cnf__input col-md-10">-->
              <!--<label>New answer</label>-->
              <!--<textarea class="basic__input textarea&#45;&#45;input small&#45;&#45;input" type="text" v-model="service.quantity" :class="[errors.quantity ? 'error': '']"></textarea>-->
              <!--<span class="error__span" v-if="errors.quantity">{{ errors.quantity[0] }}</span>-->
            <!--</div>-->
            <!--<div class="cnf__input col-md-2">-->
              <!--<label class="no&#45;&#45;margin">E sakte</label>-->
              <!--<input class="checkbox" type="checkbox" v-model="service.quantity" :class="[errors.quantity ? 'error': '']">-->
              <!--<span class="error__span" v-if="errors.quantity">{{ errors.quantity[0] }}</span>-->
            <!--</div>-->
            <!--<div class="cnf__input col-md-2">-->
              <!--<label class="no&#45;&#45;margin">E pa sakte</label>-->
              <!--<input class="checkbox" type="checkbox" v-model="service.quantity" :class="[errors.quantity ? 'error': '']">-->
              <!--<span class="error__span" v-if="errors.quantity">{{ errors.quantity[0] }}</span>-->
            <!--</div>-->
            <!--<div class="cnf__input col-md-12">-->
              <!--<button class="btn btn-primary">Save answers</button>-->
            <!--</div>-->
          <!--</div>-->
        <!--</div>-->
      </div>
      <div class="modal__footer border--top">
        <button class="button__style btn--footer_modal">Save question</button>
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
        show: false,
        service: {},
        errors: {}
      }
    },
    methods: {
      showModal: function () {
        this.show = !this.show
      }
    }
  }
</script>
