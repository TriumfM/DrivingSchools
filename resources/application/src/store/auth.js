import {AuthHttp} from '@/helpers/http-helper'
import router from '@/router/index'

const state = {
  token: {
    access_token: '',
    token_type: '',
    expires_in: '',
    scope: '',
    jti: '',
    test: '',
    loginUser: '',
  },
  user: {},
  errors: {
    email: '',
    password: ''
  },
}

const getters = {
  getToken: state => state.token,
  getUser: state => state.user,
  getErrors: state => state.errors
}

const mutations = {
  setToken (state, token) {
    state.token = token
  },
  setError (state, errors) {
    state.errors = errors
  },
  setUser (state, user) {
    state.user = user
  }
}

const actions = {
  login ({ commit }, user) {
    let formData = new FormData()
    formData.set('email', user.email)
    formData.set('password', user.password)
    formData.set('grant_type', 'password')

    AuthHttp.post('api/auth/login', formData)
      .then(response => {
        commit('setToken', response.data)
        AuthHttp.get(`api/auth/details`)
          .then(responsee => {
            commit('setUser', responsee.data)
          })
      }).catch(e => {
      commit('setError', e.response.data.errors)
      localStorage.setItem('vuex', '')
    })
  },
  userData ({ commit }) {
    AuthHttp.get(`auth/details`)
      .then(response => {
        commit('setUser', response.data)
        console.log(response.data)
      })
    console.log(1)
  }
}

export default {
  namespaced: true,

  state: state,
  getters: getters,
  mutations: mutations,
  actions: actions
}
