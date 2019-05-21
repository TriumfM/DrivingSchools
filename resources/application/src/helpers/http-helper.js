import axios from 'axios'
import {store} from '../store'

export const Http = axios.create({
  baseURL: 'api/'
})

Http.interceptors.request.use(function (request) {
  request.headers.Authorization = 'Bearer ' + store.state.authStore.token.access_token

  return request
})

Http.interceptors.response.use(response => {
  return response
}, error => {
  if (error.response.status === 409) {
    store.dispatch('errorsStore/addError', {title: error.response.data.error, body: error.response.data.message, status: error.response.status})
  }

  return Promise.reject(error)
})

export const AuthHttp = axios.create({
  headers: {
    'Content-Type': 'multipart/form-data'
  },
})
