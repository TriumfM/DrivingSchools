<template>
  <div class="login__container">
    <div class="forms__container">
      <img src="@/assets/img/logo.png"/>
      <div class="form__input">
        <label class="input__name">Numri Juaj</label>
        <input type="email" class="input__value" v-model="user.number"/>
        <div :class="{'input__icon': true, 'error__case': (errors.number && errors.number[0] != 'Your account has expired!')}">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 290.13 512">
            <path d="M298.67,25.6H213.33a8.54,8.54,0,0,0,0,17.07h85.34a8.54,8.54,0,0,0,0-17.07Z" transform="translate(-110.93)" />
            <path d="M358.4,25.6h-8.53a8.54,8.54,0,1,0,0,17.07h8.53a8.54,8.54,0,0,0,0-17.07Z" transform="translate(-110.93)" />
            <path d="M266.6,435.2H245.41a23.57,23.57,0,0,0-23.54,23.54v4.13A23.56,23.56,0,0,0,245.4,486.4h21.19a23.56,23.56,0,0,0,23.54-23.53v-4.13A23.56,23.56,0,0,0,266.6,435.2Zm6.47,27.66a6.47,6.47,0,0,1-6.47,6.47H245.41a6.48,6.48,0,0,1-6.48-6.47v-4.12a6.48,6.48,0,0,1,6.48-6.47h21.18a6.48,6.48,0,0,1,6.48,6.47Z" transform="translate(-110.93)" />
            <path d="M370.23,0H141.78a30.89,30.89,0,0,0-30.85,30.85v450.3A30.89,30.89,0,0,0,141.78,512H370.22a30.88,30.88,0,0,0,30.85-30.84V30.85A30.88,30.88,0,0,0,370.23,0ZM384,481.15a13.79,13.79,0,0,1-13.77,13.78H141.78A13.79,13.79,0,0,1,128,481.16V30.85a13.79,13.79,0,0,1,13.78-13.78H370.22A13.79,13.79,0,0,1,384,30.85v450.3Z" transform="translate(-110.93)" />
            <path d="M392.53,51.2H119.47a8.54,8.54,0,0,0-8.54,8.53v358.4a8.55,8.55,0,0,0,8.54,8.54H392.53a8.55,8.55,0,0,0,8.54-8.54V59.73A8.54,8.54,0,0,0,392.53,51.2ZM384,409.6H128V68.27H384Z" transform="translate(-110.93)" />
          </svg>
        </div>
      </div>
      <div class="form__input">
        <label class="input__name">Fjalëkalimi</label>
        <input type="password" class="input__value" v-model="user.password" @keyup.enter="login(user)"/>
        <div :class="{'input__icon': true, 'input_pass': true, 'error__case': errors.password }">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27.26 30.28">
            <path class="cls-1" d="M84.76,110.31H67.52a5,5,0,0,1-5-5V94.17a5,5,0,0,1,5-5H84.76a5,5,0,0,1,5,5v11.12A5,5,0,0,1,84.76,110.31Zm-17.24-19a2.84,2.84,0,0,0-2.83,2.84v11.12a2.84,2.84,0,0,0,2.83,2.84H84.76a2.84,2.84,0,0,0,2.83-2.84V94.17a2.84,2.84,0,0,0-2.83-2.84Z" transform="translate(-62.51 -80.03)" />
            <path class="cls-1" d="M83.85,87.74H81.67a5.53,5.53,0,0,0-11.06,0H68.43a7.71,7.71,0,0,1,15.42,0Z" transform="translate(-62.51 -80.03)" />
            <path class="cls-1" d="M76.14,103A1.08,1.08,0,0,1,75.05,102V98.77a1.09,1.09,0,0,1,2.18,0V102A1.08,1.08,0,0,1,76.14,103Z" transform="translate(-62.51 -80.03)" />
          </svg>
        </div>
      </div>
      <span v-if="errors.number || errors.password" class="error__details">{{(errors.number) ? errors.number[0] : errors.password[0]}}</span>
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
          number: '',
          password: ''
        },
        errors: {},
        showLoading: false
      }
    },
    mounted: function () {
      if (localStorage.getItem('vuex') != '' || localStorage.getItem('vuex') == undefined) {
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
