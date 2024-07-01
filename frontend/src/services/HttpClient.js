import axios from 'axios'
import Storage from './Storage'

let token = Storage.get('token')

const httpClient = axios.create({
  baseURL: 'http://localhost:8000/api'
})

httpClient.defaults.headers.common['Authorization'] = `Bearer ${token}`

export default {
  get(endpoint) {
    return httpClient.get(endpoint)
  },
  post(endpoint, data) {
    return httpClient.post(endpoint, data)
  },
  delete(endpoint) {
    return httpClient.delete(endpoint)
  }
}
