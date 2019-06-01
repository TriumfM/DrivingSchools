<template>
  <div class="login__container">
    <div class="forms__container">
      <img src="@/assets/img/logo.png"/>
      <div class="form__input">
        <label class="input__name">Emaili Juaj</label>
        <input type="email" class="input__value" v-model="user.email"/>
        <div :class="{'input__icon': true, 'error__case': errors.email}">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.5 21.69">
            <path class="cls-1" d="M105.91,74.62H84.37a3.48,3.48,0,0,0-3.48,3.49V92.83a3.48,3.48,0,0,0,3.48,3.48h21.54a3.48,3.48,0,0,0,3.48-3.48V78.11A3.48,3.48,0,0,0,105.91,74.62Zm1.89,18.21a1.89,1.89,0,0,1-1.89,1.89H84.37a1.89,1.89,0,0,1-1.89-1.89V78.11a1.89,1.89,0,0,1,1.89-1.89h21.54a1.89,1.89,0,0,1,1.89,1.89V92.83Z" transform="translate(-80.89 -74.62)" />
            <path class="cls-1" d="M98.86,85.28l7-6.25a.79.79,0,0,0-1.06-1.18l-9.62,8.62L93.28,84.8s0,0,0,0l-.13-.11L85.5,77.84a.79.79,0,0,0-1.12.07A.78.78,0,0,0,84.44,79l7.06,6.31-7,6.57a.8.8,0,0,0,0,1.13.83.83,0,0,0,.58.25.78.78,0,0,0,.54-.21l7.13-6.67,1.94,1.73a.81.81,0,0,0,.53.2.77.77,0,0,0,.53-.21l2-1.78,7.09,6.74a.81.81,0,0,0,.55.21.79.79,0,0,0,.54-1.37Z" transform="translate(-80.89 -74.62)" />
          </svg>
        </div>
      </div>
      <div class="form__input">
        <label class="input__name">Fjalëkalimi</label>
        <input type="password" class="input__value" v-model="user.password"/>
        <div :class="{'input__icon': true, 'input_pass': true, 'error__case': errors.password }">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27.26 30.28">
            <path class="cls-1" d="M84.76,110.31H67.52a5,5,0,0,1-5-5V94.17a5,5,0,0,1,5-5H84.76a5,5,0,0,1,5,5v11.12A5,5,0,0,1,84.76,110.31Zm-17.24-19a2.84,2.84,0,0,0-2.83,2.84v11.12a2.84,2.84,0,0,0,2.83,2.84H84.76a2.84,2.84,0,0,0,2.83-2.84V94.17a2.84,2.84,0,0,0-2.83-2.84Z" transform="translate(-62.51 -80.03)" />
            <path class="cls-1" d="M83.85,87.74H81.67a5.53,5.53,0,0,0-11.06,0H68.43a7.71,7.71,0,0,1,15.42,0Z" transform="translate(-62.51 -80.03)" />
            <path class="cls-1" d="M76.14,103A1.08,1.08,0,0,1,75.05,102V98.77a1.09,1.09,0,0,1,2.18,0V102A1.08,1.08,0,0,1,76.14,103Z" transform="translate(-62.51 -80.03)" />
          </svg>
        </div>
      </div>
      <button class="button__style login--button" @click="login(user)">Kyquni<img src="@/assets/img/arrow_right.svg"></button>
    </div>
  </div>
</template>

<script>

  import {mapActions} from 'vuex'

  export default {
    data () {
      return {
        user: {
          email: '',
          password: ''
        },
        errors: {},
        showLoading: false
      }
    },
    mounted: function () {
      if (localStorage.getItem('vuex') !== '' || localStorage.getItem('vuex') === undefined) {
        this.$router.push('login')
      }
      this.$store.watch(
        (state) => {
          return this.$store.getters['authStore/getErrors']
        },
        (val) => {
          this.errors = this.$store.getters['authStore/getErrors']
          this.showLoading = false
        })
    },
    methods: {
      ...mapActions('authStore', [
        'login'
      ]),

    }
  }
</script>
