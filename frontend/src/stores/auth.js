import router from '@/router'
import httpClient from '@/services/http-client'
import { defineStore } from 'pinia'

export const useAuth = defineStore('auth', {
  state: () => ({ token: null }),
  getters: {},
  actions: {
    login(credentials) {
      httpClient.post('/login', credentials).then((response) => {
        const token = response.data.data.token
        httpClient.setAuthToken(token)
        this.token = token
        router.push({ name: 'admin.products' })
      })
    }
  },
  persist: true
})
