import axios from 'axios'
import storage from './storage'

const httpFactory = axios.create({
  baseURL: 'http://localhost:8000/api'
})

const httpClient = {
  setAuthToken(token) {
    httpFactory.defaults.headers.common['Authorization'] = `Bearer ${token}`
  },
  setInterceptor() {
    httpFactory.interceptors.response.use(
      (response) => {
        return response
      },
      (error) => {
        if (error.response.status === 401) {
          storage.remove('auth')
          location.href = '/auth/login'
          return
        }
        return Promise.reject(error)
      }
    )
  },
  get(endpoint) {
    return httpFactory.get(endpoint)
  },
  post(endpoint, data) {
    return httpFactory.post(endpoint, data)
  },
  delete(endpoint) {
    return httpFactory.delete(endpoint)
  }
}

export default httpClient
